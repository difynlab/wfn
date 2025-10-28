<?php

namespace App\Http\Controllers\Backend\Tenant;

use App\Http\Controllers\Controller;
use App\Mail\AdminBookingUpdateMail;
use App\Mail\BookingUpdateMail;
use App\Mail\LandlordBookingUpdateMail;
use App\Models\Booking;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        return view('backend.tenant.bookings.index', [
            'items' => $items,
            'pagination' => $pagination,
            'warehouses' => $warehouses
        ]);
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
}