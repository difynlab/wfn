<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    private function processData($items)
    {
        foreach($items as $item) {
            $item->action = '
            <a href="'. route('admin.reports.edit', $item->id) .'" class="action-button edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$item->id.'" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $tenant_name = $item->user->first_name . ' ' . $item->user->last_name;
            $item->tenant = '<a href="'. route('admin.users.edit', $item->user_id) .'" class="table-link">' . $tenant_name . '</a>';

            $item->warehouse = '<a href="'. route('admin.warehouses.edit', $item->warehouse_id) .'" class="table-link">' . $item->warehouse->name_en . '</a>';

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
        $users = User::where('status', 1)->whereNot('role', 'admin')->get();
        $warehouses = Warehouse::where('status', 1)->get();

        Report::where('is_new', 1)->update(['is_new' => 0]);
        
        $pagination = $request->pagination ?? 10;
        $items = Report::orderBy('id', 'desc')->paginate($pagination);

        $items = $this->processData($items);

        return view('backend.admin.reports.index', [
            'items' => $items,
            'pagination' => $pagination,
            'users' => $users,
            'warehouses' => $warehouses
        ]);
    }

    public function edit(Report $report)
    {
        $users = User::where('status', 1)->whereNot('role', 'admin')->get();
        $warehouses = Warehouse::where('status', 1)->get();

        return view('backend.admin.reports.edit', [
            'report' => $report,
            'users' => $users,
            'warehouses' => $warehouses
        ]);
    }

    public function update(Request $request, Report $report)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'warehouse_id' => 'required|integer',
            'reason' => 'required',
            'status' => 'required|in:0,1,2'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('admin.reports.index')
            ]);
        }

        $data = $request->all();
        $report->fill($data)->save();
        
        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('admin.reports.index')
        ]);
    }

    public function destroy(Report $report)
    {
        $report->delete();

        return redirect()->back()->with('delete', 'Successfully Deleted!');
    }

    public function filter(Request $request)
    {
        $selected_tenant = $request->selected_tenant;
        $selected_warehouse = $request->selected_warehouse;
        $status = $request->status;
        $column = $request->column ?? 'id';
        $direction = $request->direction ?? 'desc';

        $valid_columns = ['reason', 'status', 'id'];
        $valid_directions = ['asc', 'desc'];

        if(!in_array($column, $valid_columns)) {
            $column = 'id';
        }

        if(!in_array($direction, $valid_directions)) {
            $direction = 'desc';
        }

        $items = Report::orderBy($column, $direction);

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
            $tbodyView = view('backend.admin.reports._tbody', compact('items'))->render();
            $paginationView = $items->appends($request->except('page'))->links("pagination::bootstrap-5")->render();

            return response()->json([
                'tbody' => $tbodyView,
                'pagination' => $paginationView,
            ]);
        }

        $users = User::where('status', 1)->whereNot('role', 'admin')->get();
        $warehouses = Warehouse::where('status', 1)->get();

        return view('backend.admin.reports.index', [
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