<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    private function processData($items)
    {
        foreach($items as $item) {
            $item->action = '
            <a href="'. route('backend.bookings.edit', $item->id) .'" class="action-button edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a href="'. route('backend.users.company.index', $item->warehouse->user_id) .'" class="action-button" title="Company"><i class="bi bi-building"></i></a>
            <a id="'.$item->id.'" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $tenant_name = $item->user->first_name . ' ' . $item->user->last_name;
            $item->tenant = '<a href="'. route('backend.users.edit', $item->user_id) .'" class="table-link">' . $tenant_name . '</a>';

            $item->warehouse = '<a href="'. route('backend.warehouses.edit', $item->warehouse_id) .'" class="table-link">' . $item->warehouse->name . '</a>';

            $item->status = ($item->status == 1) ? '<span class="status active-status">Active</span>' : '<span class="status inactive-status">Inactive</span>';
        }

        return $items;
    }

    public function index(Request $request)
    {
        $users = User::where('status', 1)->where('role', 'tenant')->get();
        $warehouses = Warehouse::where('status', 1)->get();
        
        $pagination = $request->pagination ?? 10;
        $items = Booking::orderBy('id', 'desc')->paginate($pagination);
        $items = $this->processData($items);

        return view('backend.admin.bookings.index', [
            'items' => $items,
            'pagination' => $pagination,
            'users' => $users,
            'warehouses' => $warehouses
        ]);
    }

    public function create()
    {
        $users = User::where('status', 1)->where('role', 'tenant')->get();
        $warehouses = Warehouse::where('status', 1)->get();

        return view('backend.admin.bookings.create', [
            'users' => $users,
            'warehouses' => $warehouses
        ]);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'warehouse_id' => 'required|integer',
            'no_of_pallets' => 'required|integer',
            'total_rent' => 'required|numeric|min:0',
            'tenancy_date' => 'required|date',
            'renewal_date' => 'required|date',
            'new_documents.*' => 'max:30720',
            'status' => 'required|in:0,1'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Creation Failed!',
                'route' => route('backend.bookings.index')
            ]);
        }

        $new_documents = [];
        if($request->file('new_documents')) {
            foreach($request->file('new_documents') as $document) {
                $document_name = Str::random(40) . '.' . $document->getClientOriginalExtension();
                $document->storeAs('backend/bookings', $document_name);
                $new_documents[] = $document_name;
            }
        }

        $data = $request->except(
            'old_documents',
            'new_documents'
        );
        $data['documents'] = $new_documents ? json_encode($new_documents) : null;
        $booking = Booking::create($data);  

        return redirect()->route('backend.bookings.edit', $booking)->with([
            'success' => "Update Successful!",
            'route' => route('backend.bookings.index')
        ]);
    }

    public function edit(Booking $booking)
    {
        $users = User::where('status', 1)->where('role', 'tenant')->get();
        $warehouses = Warehouse::where('status', 1)->get();

        return view('backend.admin.bookings.edit', [
            'booking' => $booking,
            'users' => $users,
            'warehouses' => $warehouses
        ]);
    }

    public function update(Request $request, Booking $booking)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'warehouse_id' => 'required|integer',
            'no_of_pallets' => 'required|integer',
            'total_rent' => 'required|numeric|min:0',
            'tenancy_date' => 'required|date',
            'renewal_date' => 'required|date',
            'new_documents.*' => 'max:30720',
            'status' => 'required|in:0,1'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('backend.bookings.index')
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

        $data = $request->except(
            'old_documents',
            'new_documents'
        );
        $data['documents'] = $documents;
        $booking->fill($data)->save();
        
        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('backend.bookings.index')
        ]);
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->back()->with('delete', 'Successfully Deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == '⟲ Reset Filter') {
            return redirect()->route('backend.bookings.index');
        }

        $selected_tenant = $request->selected_tenant;
        $selected_warehouse = $request->selected_warehouse;
        $order_by = $request->order_by;
        $status = $request->status;

        $items = Booking::query();

        if($selected_tenant) {
            $items->where('user_id', $selected_tenant);
        }

        if($selected_warehouse) {
            $items->where('warehouse_id', $selected_warehouse);
        }

        if($order_by == 'a-z') {
            $items->orderBy('id', 'asc');
        }
        else {
            $items->orderBy('id', 'desc');
        }

        if($status != null) {
            $items->where('status', $status);
        }

        $pagination = $request->pagination ?? 10;
        $items = $items->paginate($pagination);
        $items = $this->processData($items);

        $users = User::where('status', 1)->where('role', 'tenant')->get();
        $warehouses = Warehouse::where('status', 1)->get();

        return view('backend.admin.bookings.index', [
            'items' => $items,
            'pagination' => $pagination,
            'selected_tenant' => $selected_tenant,
            'selected_warehouse' => $selected_warehouse,
            'order_by' => $order_by,
            'status' => $status,
            'users' => $users,
            'warehouses' => $warehouses
        ]);
    }
}