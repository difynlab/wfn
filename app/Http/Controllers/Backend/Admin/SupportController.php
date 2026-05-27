<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    private function processData($items)
    {
        foreach($items as $item) {
            $item->action = '
            <a id="'.$item->id.'" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';
        }

        return $items;
    }

    public function index(Request $request)
    {
        $pagination = clamp_pagination($request->pagination);
        $items = Support::orderBy('id', 'desc')->paginate($pagination);
        $items = $this->processData($items);

        Support::where('is_new', 1)->update(['is_new' => 0]);

        return view('backend.admin.supports.index', [
            'items' => $items,
            'pagination' => $pagination
        ]);
    }

    public function destroy(Support $support)
    {
        $support->delete();

        return redirect()->back()->with('delete', 'Successfully Deleted!');
    }

    public function filter(Request $request)
    {
        $name = $request->name;
        $column = $request->column ?? 'id';
        $direction = $request->direction ?? 'desc';

        $valid_columns = ['name', 'phone', 'email', 'category', 'subject', 'message', 'id'];
        $valid_directions = ['asc', 'desc'];

        if(!in_array($column, $valid_columns)) {
            $column = 'id';
        }

        if(!in_array($direction, $valid_directions)) {
            $direction = 'desc';
        }

        $items = Support::orderBy($column, $direction);

        if($name) {
            $items->where('name', 'like', '%' . $name . '%');
        }

        $pagination = clamp_pagination($request->pagination);
        $items = $items->paginate($pagination);
        $items = $this->processData($items);

        if($request->ajax()) {
            $tbodyView = view('backend.admin.supports._tbody', compact('items'))->render();
            $paginationView = $items->appends($request->except('page'))->links("pagination::bootstrap-5")->render();

            return response()->json([
                'tbody' => $tbodyView,
                'pagination' => $paginationView,
            ]);
        }

        return view('backend.admin.supports.index', [
            'items' => $items,
            'pagination' => $pagination,
            'name' => $name
        ]);
    }
}