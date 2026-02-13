<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\AccountRegisterMail;
use App\Mail\AdminAccountRegisterMail;
use App\Mail\AdminBookingMail;
use App\Mail\BookingMail;
use App\Mail\LandlordBookingMail;
use App\Models\Booking;
use Illuminate\Support\Str;
use App\Models\Conversation;
use App\Models\StorageType;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class APIController extends Controller
{
    public function storageTypes()
    {
        $storage_types = StorageType::where('status', 1)->orderBy('created_at', 'desc')->get();

        if($storage_types->isEmpty()) {
            return apiResponse('Data not found', 404);
        }

        return apiResponse('Data found', 200, $storage_types);
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'min:3', 'max:255'],
            'phone' => ['required', 'min:3', 'max:255', 'regex:/^\+?[0-9]+$/'],
            'conversation_id' => ['nullable', 'max:255'],
            'city' => ['nullable', 'max:255'],
            'storage_type_id' => ['nullable', 'exists:storage_types,id']
        ]);

        $user = User::where('email', $request->email)->where('status', 1)->first();

        if(!$user) {
            $request->validate([
                'email' => ['unique:users,email'],
                'phone' => ['unique:users,phone']
            ]);

            $password = Str::random(12);

            $data = [
                'first_name' => 'New',
                'last_name' => 'Tenant',
                'phone' => $request->phone,
                'email' => $request->email,
                'role' => 'tenant',
                'password' => bcrypt($password)
            ];

            $user = User::create($data);

            // ODOO INTEGRATION
                try {
                    $url = config('services.odoo.url');
                    $db = config('services.odoo.db');
                    $username = config('services.odoo.username');
                    $password = config('services.odoo.password');

                    $client = new Client();

                    $auth = $client->post($url, [
                        'json' => [
                            'jsonrpc' => '2.0',
                            'method'  => 'call',
                            'params'  => [
                                'service' => 'common',
                                'method'  => 'authenticate',
                                'args'    => [$db, $username, $password, []],
                            ],
                            'id' => 1,
                        ],
                    ])->getBody()->getContents();

                    $uid = data_get(json_decode($auth, true), 'result');

                    $create = $client->post($url, [
                        'json' => [
                            'jsonrpc' => '2.0',
                            'method'  => 'call',
                            'params'  => [
                                'service' => 'object',
                                'method'  => 'execute_kw',
                                'args'    => [
                                    $db, $uid, $password,
                                    'res.partner', 'create',
                                    [[
                                        'name'  => $user->first_name . ' ' . $user->last_name,
                                        'email' => $user->email,
                                        'phone' => $user->phone
                                    ]],
                                ],
                            ],
                            'id' => 2,
                        ],
                    ])->getBody()->getContents();
                }
                catch (\Throwable $e) {
                    Log::warning('Failed to sync contact to Odoo: '.$e->getMessage());
                }
            // ODOO INTEGRATION

            $mail_data = [
                'name' => $user->first_name . ' ' . $user->last_name,
                'email' => $user->email,
                'role' => $user->role,
                'password' => $password,
                'created_at' => $user->created_at,
            ];

            send_email(new AccountRegisterMail($mail_data), $request->email);
            send_email(new AdminAccountRegisterMail($mail_data), config('app.admin_email'));
        }

        $conversation = new Conversation();
        $validated['user_id'] = $user->id;
        $conversation->fill($validated)->save();

        $city = $request->city;
        $storage_type = $request->storage_type_id;

        $warehouses = Warehouse::where('status', 1)->orderBy('id', 'desc');

        if($city) {
            $warehouses->where('city', 'like', '%' . $city . '%');
        }

        if($storage_type) {
            $warehouses->where('storage_type_id', $storage_type);
        }

        $warehouses = $warehouses->get();

        if($warehouses->isEmpty()) {
            return apiResponse('Data not found', 404);
        }
 
        return apiResponse('Data found', 200, [
            'user' => $user,
            'conversation' => $conversation,
            'warehouses' => $warehouses
        ]);
    }

    public function booking(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'conversation_id' => ['required', 'exists:conversations,id'],
            'warehouse_id' => ['required', 'exists:warehouses,id'],
            'tenancy_date' => ['required', 'date'],
            'renewal_date' => ['required', 'date'],
            'no_of_pallets' => ['nullable', 'integer', 'required_without:no_of_square_meters'],
            'no_of_square_meters' => ['nullable', 'integer', 'required_without:no_of_pallets']
        ]);

        $tenant = User::find($request->user_id);
        $warehouse = Warehouse::find($request->warehouse_id);
        $landlord = User::find($warehouse->user_id);

        $validated['status'] = 2;
        $booking = Booking::create($validated);

        $mail_data = [
            'tenant_name' => $tenant->first_name . ' ' . $tenant->last_name,
            'tenant_email' => $tenant->email,
            'landlord_name' => $landlord->first_name . ' ' . $landlord->last_name,
            'landlord_email' => $landlord->email,
            'warehouse_name' => $warehouse->name_en,
            'tenancy_date' => $booking->tenancy_date,
            'renewal_date' => $booking->renewal_date,
            'no_of_pallets' => $booking->no_of_pallets,
            'booking_id' => $booking->id,
        ];

        send_email(new BookingMail($mail_data), $tenant->email);
        send_email(new LandlordBookingMail($mail_data), $landlord->email);
        send_email(new AdminBookingMail($mail_data), config('app.admin_email'));

        return apiResponse('Your warehouse setup is now complete.', 200);
    }

    public function requests(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'min:3', 'max:255'],
            'phone' => ['required', 'min:3', 'max:255', 'regex:/^\+?[0-9]+$/'],
            'warehouse_id' => ['nullable', 'exists:warehouses,id'],
            'conversation_id' => ['nullable', 'exists:conversations,id'],
        ]);

        $tenant = User::where('email', $request->email)->where('status', 1)->first();
        $bookings = Booking::where('user_id', $tenant->id)->orderBy('id', 'desc');

        $warehouse_id = $request->warehouse_id;
        $conversation_id = $request->conversation_id;

        if($warehouse_id) {
            $bookings->where('warehouse_id', $warehouse_id);
        }

        if($conversation_id) {
            $bookings->where('conversation_id', $conversation_id);
        }

        $bookings = $bookings->get();

        foreach($bookings as $key => $booking) {
            $booking->warehouse = $booking->warehouse;
            $booking->conversation = $booking->conversation;
        }

        if($bookings->isEmpty()) {
            return apiResponse('Data not found', 404);
        }
 
        return apiResponse('Data found', 200, $bookings);
    }
}