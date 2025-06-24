<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Company;
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
            $company = Company::find($item->warehouse_id)->where('status', 1)->first();
            
            $item->action = '
            <a href="'. route('admin.bookings.edit', $item->id) .'" class="action-button edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a href="'. route('admin.users.company.index', $company->user_id) .'" class="action-button" title="Company"><i class="bi bi-building"></i></a>
            <a id="'.$item->id.'" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $tenant = User::find($item->user_id);
            $tenant_name = $tenant->first_name . ' ' . $tenant->last_name;
            $item->tenant = '<a href="'. route('admin.users.edit', $item->user_id) .'" class="table-link">' . $tenant_name . '</a>';

            $warehouse = Warehouse::find($item->warehouse_id)->name;
            $item->warehouse = '<a href="'. route('admin.warehouses.edit', $item->warehouse_id) .'" class="table-link">' . $warehouse . '</a>';

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
            'pagination' => $pagination
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
                'route' => route('admin.bookings.index')
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

        return redirect()->route('admin.bookings.edit', $booking)->with([
            'success' => "Update Successful!",
            'route' => route('admin.bookings.index')
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
                'route' => route('admin.bookings.index')
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
            'route' => route('admin.bookings.index')
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
            return redirect()->route('admin.bookings.index');
        }

        $tenant = $request->tenant;
        $warehouse = $request->warehouse;
        $tenancy_date = $request->tenancy_date;
        $renewal_date = $request->renewal_date;
        $order_by = $request->order_by;
        $status = $request->status;

        $items = Warehouse::query();

        if($name) {
            $items->where('name', 'like', '%' . $name . '%');
        }

        if($address) {
            $items->where(function($data) use ($address) {
                $data->where('address_en', 'like', "%{$address}%")
                ->orWhere('address_ar', 'like', "%{$address}%");
            });
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

        return view('backend.admin.warehouses.index', [
            'items' => $items,
            'pagination' => $pagination,
            'name' => $name,
            'address' => $address,
            'order_by' => $order_by,
            'status' => $status
        ]);
    }
}