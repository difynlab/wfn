<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StorageType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StorageTypeController extends Controller
{
    private function processData($items)
    {
        foreach($items as $item) {
            $item->action = '
            <a href="'. route('backend.storage-types.edit', $item->id) .'" class="action-button edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$item->id.'" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $item->status = ($item->status == 1) ? '<span class="status active-status">Active</span>' : '<span class="status inactive-status">Inactive</span>';
        }

        return $items;
    }

    public function index(Request $request)
    {
        $pagination = $request->pagination ?? 10;
        $items = StorageType::orderBy('id', 'desc')->paginate($pagination);
        $items = $this->processData($items);

        return view('backend.admin.storage-types.index', [
            'items' => $items,
            'pagination' => $pagination
        ]);
    }

    public function create()
    {
        return view('backend.admin.storage-types.create');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:0|max:255',
            'status' => 'required|in:0,1'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Creation Failed!',
                'route' => route('backend.storage-types.index')
            ]);
        }

        $data = $request->all();
        $storage_type = StorageType::create($data);  

        return redirect()->route('backend.storage-types.edit', $storage_type)->with([
            'success' => "Update Successful!",
            'route' => route('backend.storage-types.index')
        ]);
    }

    public function edit(StorageType $storage_type)
    {
        return view('backend.admin.storage-types.edit', [
            'storage_type' => $storage_type
        ]);
    }

    public function update(Request $request, StorageType $storage_type)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:0|max:255',
            'status' => 'required|in:0,1'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('backend.storage-types.index')
            ]);
        }

        $data = $request->all();
        $storage_type->fill($data)->save();
        
        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('backend.storage-types.index')
        ]);
    }

    public function destroy(StorageType $storage_type)
    {
        $storage_type->delete();

        return redirect()->back()->with('delete', 'Successfully Deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == '⟲ Reset Filter') {
            return redirect()->route('backend.storage-types.index');
        }

        $name = $request->name;
        $order_by = $request->order_by;
        $status = $request->status;

        $items = StorageType::query();

        if($name) {
            $items->where('name', 'like', '%' . $name . '%');
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

        return view('backend.admin.storage-types.index', [
            'items' => $items,
            'pagination' => $pagination,
            'name' => $name,
            'order_by' => $order_by,
            'status' => $status
        ]);
    }
}