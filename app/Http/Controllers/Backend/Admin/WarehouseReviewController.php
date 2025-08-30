<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Warehouse;
use App\Models\WarehouseReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WarehouseReviewController extends Controller
{
    private function processData($items)
    {
        foreach($items as $item) {
            $item->action = '
            <a href="'. route('admin.warehouse-reviews.edit', [$item->warehouse_id, $item->id]) .'" class="action-button edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$item->id.'" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $tenant_name = $item->user->first_name . ' ' . $item->user->last_name;
            $item->tenant = '<a href="'. route('admin.users.edit', $item->user_id) .'" class="table-link">' . $tenant_name . '</a>';

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

    public function index(Request $request, Warehouse $warehouse)
    {
        $users = User::where('status', 1)->whereNot('role', 'admin')->get();
        $warehouses = Warehouse::where('status', 1)->get();

        $pagination = $request->pagination ?? 10;
        $items = WarehouseReview::where('warehouse_id', $warehouse->id)->orderBy('id', 'desc')->paginate($pagination);
        $items = $this->processData($items);

        return view('backend.admin.warehouse-reviews.index', [
            'items' => $items,
            'pagination' => $pagination,
            'users' => $users,
            'warehouses' => $warehouses,
            'warehouse' => $warehouse
        ]);
    }

    public function create(Warehouse $warehouse)
    {
        $users = User::where('status', 1)->whereNot('role', 'admin')->get();

        return view('backend.admin.warehouse-reviews.create', [
            'users' => $users,
            'warehouse' => $warehouse
        ]);
    }

    public function store(Request $request, Warehouse $warehouse)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'star' => 'required|in:1,2,3,4,5',
            'language' => 'required|in:english,arabic',
            'content' => 'required|min:3|max:255',
            'status' => 'required|in:0,1,2',
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Creation Failed!',
                'route' => route('admin.warehouse-reviews.index', $warehouse)
            ]);
        }

        $data = $request->all();
        $data['warehouse_id'] = $warehouse->id;
        $review = WarehouseReview::create($data);  

        return redirect()->route('admin.warehouse-reviews.edit', [$warehouse, $review])->with([
            'success' => "Update Successful!",
            'route' => route('admin.warehouse-reviews.index', $warehouse)
        ]);
    }

    public function edit(Warehouse $warehouse, WarehouseReview $warehouse_review)
    {
        $users = User::where('status', 1)->whereNot('role', 'admin')->get();

        return view('backend.admin.warehouse-reviews.edit', [
            'users' => $users,
            'warehouse' => $warehouse,
            'warehouse_review' => $warehouse_review,
        ]);
    }

    public function update(Request $request, Warehouse $warehouse, WarehouseReview $warehouse_review)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'star' => 'required|in:1,2,3,4,5',
            'language' => 'required|in:english,arabic',
            'content' => 'required|min:3|max:255',
            'status' => 'required|in:0,1,2',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('admin.warehouse-reviews.index', $warehouse->id)
            ]);
        }

        $data = $request->all();
        $warehouse_review->fill($data)->save();
        
        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('admin.warehouse-reviews.index', $warehouse->id)
        ]);
    }

    public function destroy(Warehouse $warehouse, WarehouseReview $warehouse_review)
    {
        $warehouse_review->delete();

        return redirect()->back()->with('delete', 'Successfully Deleted!');
    }

    // public function filter(Request $request)
    // {
    //     $selected_tenant = $request->selected_tenant;
    //     $selected_warehouse = $request->selected_warehouse;
    //     $status = $request->status;
    //     $column = $request->column ?? 'id';
    //     $direction = $request->direction ?? 'desc';

    //     $valid_columns = ['reason', 'status', 'id'];
    //     $valid_directions = ['asc', 'desc'];

    //     if(!in_array($column, $valid_columns)) {
    //         $column = 'id';
    //     }

    //     if(!in_array($direction, $valid_directions)) {
    //         $direction = 'desc';
    //     }

    //     $items = Report::orderBy($column, $direction);

    //     if($selected_tenant) {
    //         $items->where('user_id', $selected_tenant);
    //     }

    //     if($selected_warehouse) {
    //         $items->where('warehouse_id', $selected_warehouse);
    //     }

    //     if($status != null) {
    //         $items->where('status', $status);
    //     }

    //     $pagination = $request->pagination ?? 10;
    //     $items = $items->paginate($pagination);
    //     $items = $this->processData($items);

    //     if($request->ajax()) {
    //         $tbodyView = view('backend.admin.reports._tbody', compact('items'))->render();
    //         $paginationView = $items->appends($request->except('page'))->links("pagination::bootstrap-5")->render();

    //         return response()->json([
    //             'tbody' => $tbodyView,
    //             'pagination' => $paginationView,
    //         ]);
    //     }

    //     $users = User::where('status', 1)->whereNot('role', 'admin')->get();
    //     $warehouses = Warehouse::where('status', 1)->get();

    //     return view('backend.admin.reports.index', [
    //         'items' => $items,
    //         'pagination' => $pagination,
    //         'selected_tenant' => $selected_tenant,
    //         'selected_warehouse' => $selected_warehouse,
    //         'status' => $status,
    //         'users' => $users,
    //         'warehouses' => $warehouses
    //     ]);
    // }
}