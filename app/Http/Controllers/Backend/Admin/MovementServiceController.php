<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\MovementService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MovementServiceController extends Controller
{
    private function processData($items)
    {
        foreach($items as $item) {
            $item->action = '
            <a href="'. route('admin.movement-services.edit', $item->id) .'" class="action-button edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$item->id.'" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

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
        $pagination = $request->pagination ?? 10;
        $items = MovementService::orderBy('id', 'desc')->paginate($pagination);
        $items = $this->processData($items);

        return view('backend.admin.movement-services.index', [
            'items' => $items,
            'pagination' => $pagination
        ]);
    }

    public function create()
    {
        return view('backend.admin.movement-services.create');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|min:3|max:255',
            'name_ar' => 'required|min:3|max:255',
            'status' => 'required|in:0,1,2'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Creation Failed!',
                'route' => route('admin.movement-services.index')
            ]);
        }

        $data = $request->all();
        $movement_service = MovementService::create($data);  

        return redirect()->route('admin.movement-services.edit', $movement_service)->with([
            'success' => "Update Successful!",
            'route' => route('admin.movement-services.index')
        ]);
    }

    public function edit(MovementService $movement_service)
    {
        return view('backend.admin.movement-services.edit', [
            'movement_service' => $movement_service
        ]);
    }

    public function update(Request $request, MovementService $movement_service)
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|min:3|max:255',
            'name_ar' => 'required|min:3|max:255',
            'status' => 'required|in:0,1,2'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('admin.movement-services.index')
            ]);
        }

        $data = $request->all();
        $movement_service->fill($data)->save();
        
        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('admin.movement-services.index')
        ]);
    }

    public function destroy(MovementService $movement_service)
    {
        $movement_service->delete();

        return redirect()->back()->with('delete', 'Successfully Deleted!');
    }

    public function filter(Request $request)
    {
        $name = $request->name;
        $status = $request->status;
        $column = $request->column ?? 'id';
        $direction = $request->direction ?? 'desc';

        $valid_columns = ['name_en', 'name_ar', 'status', 'id'];
        $valid_directions = ['asc', 'desc'];

        if(!in_array($column, $valid_columns)) {
            $column = 'id';
        }

        if(!in_array($direction, $valid_directions)) {
            $direction = 'desc';
        }

        $items = MovementService::orderBy($column, $direction);

        if($name) {
            $items->where(function ($query) use ($name) {
                $query->where('name_en', 'like', '%' . $name . '%')
                    ->orWhere('name_ar', 'like', '%' . $name . '%');
            });
        }

        if($status != null) {
            $items->where('status', $status);
        }

        $pagination = $request->pagination ?? 10;
        $items = $items->paginate($pagination);
        $items = $this->processData($items);

        if($request->ajax()) {
            $tbodyView = view('backend.admin.movement-services._tbody', compact('items'))->render();
            $paginationView = $items->appends($request->except('page'))->links("pagination::bootstrap-5")->render();

            return response()->json([
                'tbody' => $tbodyView,
                'pagination' => $paginationView,
            ]);
        }

        return view('backend.admin.movement-services.index', [
            'items' => $items,
            'pagination' => $pagination,
            'name' => $name,
            'status' => $status
        ]);
    }
}