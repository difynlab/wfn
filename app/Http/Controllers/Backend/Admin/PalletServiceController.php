<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\PalletService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PalletServiceController extends Controller
{
    private function processData($items)
    {
        foreach($items as $item) {
            $item->action = '
            <a href="'. route('admin.pallet-services.edit', $item->id) .'" class="action-button edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
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
        $items = PalletService::orderBy('id', 'desc')->paginate($pagination);
        $items = $this->processData($items);

        return view('backend.admin.pallet-services.index', [
            'items' => $items,
            'pagination' => $pagination
        ]);
    }

    public function create()
    {
        return view('backend.admin.pallet-services.create');
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
                'route' => route('admin.pallet-services.index')
            ]);
        }

        $data = $request->all();
        $pallet_service = PalletService::create($data);  

        return redirect()->route('admin.pallet-services.edit', $pallet_service)->with([
            'success' => "Update Successful!",
            'route' => route('admin.pallet-services.index')
        ]);
    }

    public function edit(PalletService $pallet_service)
    {
        return view('backend.admin.pallet-services.edit', [
            'pallet_service' => $pallet_service
        ]);
    }

    public function update(Request $request, PalletService $pallet_service)
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|min:3|max:255',
            'name_ar' => 'required|min:3|max:255',
            'status' => 'required|in:0,1,2'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('admin.pallet-services.index')
            ]);
        }

        $data = $request->all();
        $pallet_service->fill($data)->save();
        
        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('admin.pallet-services.index')
        ]);
    }

    public function destroy(PalletService $pallet_service)
    {
        $pallet_service->delete();

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

        $items = PalletService::orderBy($column, $direction);

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
            $tbodyView = view('backend.admin.pallet-services._tbody', compact('items'))->render();
            $paginationView = $items->appends($request->except('page'))->links("pagination::bootstrap-5")->render();

            return response()->json([
                'tbody' => $tbodyView,
                'pagination' => $paginationView,
            ]);
        }

        return view('backend.admin.pallet-services.index', [
            'items' => $items,
            'pagination' => $pagination,
            'name' => $name,
            'status' => $status
        ]);
    }
}