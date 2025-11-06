<?php

namespace App\Http\Controllers\Backend\Tenant;

use App\Http\Controllers\Controller;
use App\Mail\AdminBookingMail;
use App\Mail\AdminBookingUpdateMail;
use App\Mail\BookingMail;
use App\Mail\BookingUpdateMail;
use App\Mail\LandlordBookingMail;
use App\Mail\LandlordBookingUpdateMail;
use App\Models\Booking;
use App\Models\StorageType;
use App\Models\User;
use App\Models\Warehouse;
use App\Services\Recaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
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

        return view('backend.tenant.bookings.index', [
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

    public function edit(Booking $booking)
    {
        $warehouses = Warehouse::where('status', 1)->get();

        return view('backend.tenant.bookings.edit', [
            'booking' => $booking,
            'warehouses' => $warehouses
        ]);
    }

    public function update(Request $request, Booking $booking)
    {
        $validator = Validator::make($request->all(), [
            'warehouse_id' => 'required|integer',
            'no_of_pallets' => 'required|integer',
            'tenancy_date' => 'required|date',
            'renewal_date' => 'required|date',
            'new_documents.*' => 'max:30720'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('tenant.bookings.index')
            ]);
        }

        // Documents
            $existing_documents = json_decode($booking->documents ?? '[]', true);
            $current_documents  = json_decode(htmlspecialchars_decode($request->old_documents ?? '[]'), true);

            foreach(array_diff($existing_documents, $current_documents) as $document) {
                $processed_image = process_image(null, 'backend/bookings', $document);
                $processed_image = process_image(null, 'backend/bookings/thumbnails', $document);
            }

            if($request->file('new_documents')) {
                foreach($request->file('new_documents') as $document) {
                    $processed_image = process_image($document, 'backend/bookings');
                    $current_documents[] = $processed_image;
                }
            }
            
            $documents = $current_documents ? json_encode($current_documents) : null;
        // Documents

        $tenant = Auth::user();
        $warehouse = Warehouse::find($request->warehouse_id);
        $landlord = User::find($warehouse->user_id);

        $data = $request->except(
            'old_documents',
            'new_documents'
        );
        $data['documents'] = $documents;
        $data['status'] = 2;
        $booking->fill($data)->save();

        switch($booking->status) {
            case 1:
                $booking->status = 'Active';
                break;

            case 2:
                $booking->status = 'Pending';
                break;

            default:
                $booking->status = 'Inactive';
                break;
        }

        $mail_data = [
            'warehouse'     => $warehouse->name_en,
            'tenant_name'   => $tenant->first_name . ' ' . $tenant->last_name,
            'tenant_email' => $tenant->email,
            'landlord_name' => $landlord->first_name . ' ' . $landlord->last_name,
            'landlord_email' => $landlord->email,
            'pallets'       => $booking->no_of_pallets,
            'tenancy_date'  => $booking->tenancy_date,
            'renewal_date'  => $booking->renewal_date,
            'total_rent'    => $booking->total_rent,
            'status'        => $booking->status,
            'booking_id'        => $booking->id,
        ];

        send_email(new BookingUpdateMail($mail_data), $tenant->email);
        send_email(new LandlordBookingUpdateMail($mail_data), $landlord->email);
        send_email(new AdminBookingUpdateMail($mail_data), config('app.admin_email'));

        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('tenant.bookings.index')
        ]);
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->back()->with('delete', 'Successfully Deleted!');
    }

    public function filter(Request $request)
    {
        $selected_warehouse = $request->selected_warehouse;
        $status = $request->status;
        $column = $request->column ?? 'id';
        $direction = $request->direction ?? 'desc';

        $valid_columns = ['no_of_pallets', 'total_rent', 'tenancy_date', 'renewal_date', 'status', 'id'];
        $valid_directions = ['asc', 'desc'];

        if(!in_array($column, $valid_columns)) {
            $column = 'id';
        }

        if(!in_array($direction, $valid_directions)) {
            $direction = 'desc';
        }

        $auth = Auth::user();
        $items = $auth->bookings()->orderBy($column, $direction);

        if($selected_warehouse) {
            $items->where('warehouse_id', $selected_warehouse);
        }

        if($status != null) {
            $items->where('status', $status);
        }

        $pagination = $request->pagination ?? 10;
        $items = $items->paginate($pagination);
        $items = $this->processData($items);

        if($request->ajax()) {
            $tbodyView = view('backend.tenant.bookings._tbody', compact('items'))->render();
            $paginationView = $items->appends($request->except('page'))->links("pagination::bootstrap-5")->render();

            return response()->json([
                'tbody' => $tbodyView,
                'pagination' => $paginationView,
            ]);
        }

        $warehouses = Warehouse::where('status', 1)->get();

        return view('backend.tenant.bookings.index', [
            'items' => $items,
            'pagination' => $pagination,
            'selected_warehouse' => $selected_warehouse,
            'status' => $status,
            'warehouses' => $warehouses
        ]);
    }

    public function search(Request $request)
    {
        $location = $request->location;
        $storage_type = $request->storage_type ?? 'all';
        $license = $request->license ?? 'all';

        session([
            'tenancy_date' => $request->tenancy_date ?? null,
            'renewal_date' => $request->renewal_date ?? null,
            'no_of_pallets' => $request->no_of_pallets ?? null,
            'no_of_square_meters' => $request->no_of_square_meters ?? null,
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

        return view('backend.tenant.bookings.results', [
            'warehouses' => $warehouses
        ]);
    }

    public function review(Warehouse $warehouse)
    {
        return view('backend.tenant.bookings.review', [
            'warehouse' => $warehouse
        ]);
    }

    public function cancel()
    {
        session()->forget(['tenancy_date', 'renewal_date', 'no_of_pallets', 'no_of_square_meters']);

        return redirect()->route('tenant.bookings.index');
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
                    'tenant-booking' => 'Booking Failed',
                    'tenant-booking-message' => 'reCAPTCHA token missing or empty.',
                ]
            );
        }

        $request->merge([
            'tenancy_date' => session('tenancy_date'),
            'renewal_date' => session('renewal_date'),
        ]);

        $validator = Validator::make($request->all(), [
            'warehouse_id' => 'required|integer',
            'no_of_pallets' => 'nullable|integer|required_without:no_of_square_meters',
            'no_of_square_meters' => 'nullable|integer|required_without:no_of_pallets',
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
                    'tenant-booking' => 'Booking Failed',
                    'tenant-booking-message' => 'Please recheck and submit again.',
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

        session()->forget(['tenancy_date', 'renewal_date', 'no_of_pallets', 'no_of_square_meters']);

        return redirect()->route('tenant.bookings.index')->with(
            [
                'tenant-booking' => 'Your warehouse setup is now complete.',
                'tenant-booking-message' => 'Thank you for your time - one of our experts will be in touch shortly to finalize your agreement.',
            ]
        );
    }
}