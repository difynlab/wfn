<?php

namespace App\Http\Controllers\Backend\Landlord;

use App\Http\Controllers\Controller;
use App\Mail\AdminBookingUpdateMail;
use App\Mail\BookingUpdateMail;
use App\Mail\LandlordBookingUpdateMail;
use App\Models\Booking;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    private function processData($items)
    {
        foreach($items as $item) {
            $item->action = '
            <a href="'. route('landlord.bookings.edit', $item->id) .'" class="action-button edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$item->id.'" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $item->tenant = $item->user->first_name . ' ' . $item->user->last_name;

            $item->warehouse = '<a href="'. route('landlord.warehouses.edit', $item->warehouse_id) .'" class="table-link">' . $item->warehouse->name_en . '</a>';

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
        $users = User::where('status', 1)->where('role', 'tenant')->get();
        $warehouses = $auth->warehouses()->where('status', 1)->get();

        Booking::where('is_landlord_new', 1)->update(['is_landlord_new' => 0]);
        
        $pagination = $request->pagination ?? 10;
        $items = Booking::whereHas('warehouse', function ($query) use ($auth) {
            $query->where('user_id', $auth->id)
                ->where('status', 1);
        })->orderBy('id', 'desc')->paginate($pagination);
        $items = $this->processData($items);

        return view('backend.landlord.bookings.index', [
            'items' => $items,
            'pagination' => $pagination,
            'users' => $users,
            'warehouses' => $warehouses
        ]);
    }

    public function edit(Booking $booking)
    {
        $auth = Auth::user();
        $users = User::where('status', 1)->where('role', 'tenant')->get();
        $warehouses = $auth->warehouses()->where('status', 1)->get();

        return view('backend.landlord.bookings.edit', [
            'booking' => $booking,
            'users' => $users,
            'warehouses' => $warehouses
        ]);
    }

    public function update(Request $request, Booking $booking)
    {
        $validator = Validator::make($request->all(), [
            'warehouse_id' => 'required|integer',
            'no_of_pallets' => 'required|integer',
            'total_rent' => 'required|numeric|min:1',
            'tenancy_date' => 'required|date',
            'renewal_date' => 'required|date',
            'new_documents.*' => 'max:30720'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('landlord.bookings.index')
            ]);
        }

        // Documents
            $existing_documents = json_decode($booking->documents ?? '[]', true);
            $current_documents  = json_decode(htmlspecialchars_decode($request->old_documents ?? '[]'), true);

            foreach(array_diff($existing_documents, $current_documents) as $document) {
                Storage::delete('backend/bookings/' . $document);
            }

            if($request->file('new_documents')) {
                foreach($request->file('new_documents') as $document) {
                    $document_name = Str::random(40) . '.' . $document->getClientOriginalExtension();
                    $document->storeAs('backend/bookings', $document_name);
                    $current_documents[] = $document_name;
                }
            }
            
            $documents = $current_documents ? json_encode($current_documents) : null;
        // Documents

        $tenant = User::find($booking->user_id);
        $warehouse = Warehouse::find($request->warehouse_id);
        $landlord = Auth::user();

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
            'route' => route('landlord.bookings.index')
        ]);
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->back()->with('delete', 'Successfully Deleted!');
    }

    public function filter(Request $request)
    {
        $selected_tenant = $request->selected_tenant;
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
        $items = Booking::whereHas('warehouse', function ($query) use ($auth) {
            $query->where('user_id', $auth->id)
                ->where('status', 1);
        })->orderBy($column, $direction);

        if($selected_tenant) {
            $items->where('user_id', $selected_tenant);
        }

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
            $tbodyView = view('backend.landlord.bookings._tbody', compact('items'))->render();
            $paginationView = $items->appends($request->except('page'))->links("pagination::bootstrap-5")->render();

            return response()->json([
                'tbody' => $tbodyView,
                'pagination' => $paginationView,
            ]);
        }

        $users = User::where('status', 1)->where('role', 'tenant')->get();
        $warehouses = $auth->warehouses()->where('status', 1)->get();

        return view('backend.landlord.bookings.index', [
            'items' => $items,
            'pagination' => $pagination,
            'selected_tenant' => $selected_tenant,
            'selected_warehouse' => $selected_warehouse,
            'status' => $status,
            'users' => $users,
            'warehouses' => $warehouses
        ]);
    }
}