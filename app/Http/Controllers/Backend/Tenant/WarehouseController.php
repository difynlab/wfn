<?php

namespace App\Http\Controllers\Backend\Tenant;

use App\Http\Controllers\Controller;
use App\Mail\AdminBookingMail;
use App\Mail\BookingMail;
use App\Mail\LandlordBookingMail;
use App\Models\Booking;
use App\Models\StorageType;
use App\Models\User;
use App\Models\Warehouse;
use App\Services\Recaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class WarehouseController extends Controller
{
    private function processData($items)
    {
        foreach($items as $item) {
            $item->action = '
            <a href="'. route('tenant.bookings.edit', $item->id) .'" class="action-button edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$item->id.'" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $item->warehouse = $item->warehouse->name_en;

            switch ($item->status) {
                case 1:
                    $item->status = '<span class="status active-status">Active</span>';
                    break;

                case 2:
                    $item->status = '<span class="status pending-status">Pending</span>';
                    break;

                default:
                    $item->status = '<span class="status inactive-status">Inactive</span>';
                    break;
            }
        }

        return $items;
    }

    public function index(Request $request)
    {
        $auth = Auth::user();
        $warehouses = Warehouse::where('status', 1)->get();
        
        $pagination = $request->pagination ?? 10;
        $items = $auth->bookings()->orderBy('id', 'desc')->paginate($pagination);
        $items = $this->processData($items);

        $cities = Warehouse::get()->pluck('city_en')->unique()->toArray();
        $storage_types = StorageType::where('status', 1)->orderBy('id', 'desc')->get();

        return view('backend.tenant.warehouses.index', [
            'items' => $items,
            'pagination' => $pagination,
            'warehouses' => $warehouses,
            'cities' => $cities,
            'storage_types' => $storage_types,
        ])
        ->with(
            [
                'title' => 'No warehouses yet',
                'description' => 'Request and approve a quote then come back to view and manage your warehouse.',
                'success_title' => session('success_title'),
                'success_description' => session('success_description'),
                'success' => session('success'),
                'message' => session('message'),
            ]
        );
    }

    public function filter(Request $request)
    {
        $location = $request->location;
        $storage_type = $request->storage_type ?? 'all';
        $license = $request->license ?? 'all';

        session([
            'tenancy_date' => $request->tenancy_date ?? null,
            'renewal_date' => $request->renewal_date ?? null,
            'no_of_pallets' => $request->no_of_pallets ?? null,
            'square_meters' => $request->square_meters ?? null,
        ]);

        $warehouses = Warehouse::where('status', 1)->orderBy('id', 'desc');

        if($location) {
            $warehouses->where(function ($query) use ($location) {
                $query->where('city_en', 'like', '%' . $location . '%')
                    ->orWhere('city_ar', 'like', '%' . $location . '%');
            });
        }

        if($storage_type != 'all') {
            $warehouses->where('storage_type_id', $storage_type);
        }

        if($license != 'all') {
            $warehouses->where('license', $license);
        }

        $warehouses = $warehouses->paginate(6);

        return view('backend.tenant.warehouses.results', [
            'warehouses' => $warehouses
        ]);
    }

    public function review(Warehouse $warehouse)
    {
        return view('backend.tenant.warehouses.review', [
            'warehouse' => $warehouse
        ]);
    }

    public function cancel()
    {
        session()->forget(['tenancy_date', 'renewal_date', 'no_of_pallets', 'square_meters']);

        return redirect()->route('tenant.warehouses.index');
    }

    public function booking(Request $request)
    {
        $recaptcha_token = $request->input('recaptcha_token');

        if(empty($recaptcha_token)) {
            Log::warning('reCAPTCHA token missing or empty', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'activity' => 'booking',
            ]);

            return redirect()->back()->withInput()->with(
                [
                    'tenant-booking-error' => 'Booking Failed',
                    'tenant-booking-error-message' => 'reCAPTCHA token missing or empty.',
                ]
            );
        }

        $request->merge([
            'tenancy_date' => session('tenancy_date'),
            'renewal_date' => session('renewal_date'),
        ]);

        $validator = Validator::make($request->all(), [
            'warehouse_id' => 'required|integer',
            'no_of_pallets' => 'nullable|integer|required_without:square_meters',
            'square_meters' => 'nullable|integer|required_without:no_of_pallets',
            'tenancy_date' => 'required|date',
            'renewal_date' => 'required|date',
            'recaptcha_token' => 'required|string',
        ]);

        $validator->after(function ($validator) use ($request, $recaptcha_token) {
            $check = Recaptcha::verify($recaptcha_token, 'booking');

            if(!$check['passes']) {
                $validator->errors()->add('recaptcha_token', 'reCAPTCHA verification failed.');

                Log::warning('Captcha verification failed', [
                    'ip' => $request->ip(),
                    'score' => $check['score'],
                    'activity' => 'booking',
                    'user_agent' => $request->userAgent(),
                ]);
            }
        });
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with(
                [
                    'tenant-booking-error' => 'Booking Failed',
                    'tenant-booking-error-message' => 'Please recheck and submit again.',
                ]
            );
        }

        $tenant = Auth::user();
        $warehouse = Warehouse::find($request->warehouse_id);
        $landlord = User::find($warehouse->user_id);

        $data = $request->except('recaptcha_token');
        $data['user_id'] = $tenant->id;
        $data['status'] = 2;
        $booking = Booking::create($data);

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

        session()->forget(['tenancy_date', 'renewal_date', 'no_of_pallets', 'square_meters']);

        return redirect()->route('tenant.warehouses.index')->with(
            [
                'success_title' => 'Your warehouse is now ready',
                'success_description' => 'Thanks for your time. An expert will be reaching out to you soon to finalize your agreement.',
                'success' => 'Your warehouse is now ready',
                'message' => 'Thanks for your time. An expert will be reaching out to you soon to finalize your agreement.',
            ]
        );
    }
}