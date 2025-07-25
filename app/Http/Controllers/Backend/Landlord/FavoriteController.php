<?php

namespace App\Http\Controllers\Backend\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    private function processData($items)
    {
        foreach($items as $item) {
            $item->action = '
            <a id="'.$item->id.'" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $item->warehouse = '<a href="'. route('warehouses.show', $item->warehouse_id) .'" class="table-link">' . $item->warehouse->name_en . '</a>';
        }

        return $items;
    }

    public function index(Request $request)
    {
        $auth = Auth::user();
        $warehouses = Warehouse::where('status', 1)->get();
        
        $pagination = $request->pagination ?? 10;
        $items = $auth->favorites()->paginate($pagination);
        $items = $this->processData($items);

        return view('backend.landlord.favorites.index', [
            'items' => $items,
            'pagination' => $pagination,
            'warehouses' => $warehouses
        ]);
    }

    public function destroy(Favorite $favorite)
    {
        $favorite->delete();

        return redirect()->back()->with('delete', 'Successfully Deleted!');
    }

    public function filter(Request $request)
    {
        $selected_warehouse = $request->selected_warehouse;
        $status = $request->status;
        $column = $request->column ?? 'id';
        $direction = $request->direction ?? 'desc';

        $valid_columns = ['id'];
        $valid_directions = ['asc', 'desc'];

        if(!in_array($column, $valid_columns)) {
            $column = 'id';
        }

        if(!in_array($direction, $valid_directions)) {
            $direction = 'desc';
        }

        $auth = Auth::user();
        $items = $auth->favorites()->orderBy($column, $direction);

        if($selected_warehouse) {
            $items->where('warehouse_id', $selected_warehouse);
        }

        $pagination = $request->pagination ?? 10;
        $items = $items->paginate($pagination);
        $items = $this->processData($items);

        if($request->ajax()) {
            $tbodyView = view('backend.landlord.favorites._tbody', compact('items'))->render();
            $paginationView = $items->appends($request->except('page'))->links("pagination::bootstrap-5")->render();

            return response()->json([
                'tbody' => $tbodyView,
                'pagination' => $paginationView,
            ]);
        }

        $warehouses = Warehouse::where('status', 1)->get();

        return view('backend.landlord.favorites.index', [
            'items' => $items,
            'pagination' => $pagination,
            'selected_warehouse' => $selected_warehouse,
            'warehouses' => $warehouses
        ]);
    }
}