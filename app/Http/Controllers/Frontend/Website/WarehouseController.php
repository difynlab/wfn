<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
use App\Models\HomepageContent;
use App\Models\Warehouse;
use App\Models\WarehouseContent;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        $contents = WarehouseContent::find(1);
        $warehouses = Warehouse::where('status', 1)->orderBy('id', 'desc')->paginate(3);
        $more_warehouses = Warehouse::where('status', 1)->inRandomOrder()->take(4)->get();

        return view('frontend.website.warehouses.index', [
            'contents' => $contents,
            'warehouses' => $warehouses,
            'more_warehouses' => $more_warehouses
        ]);
    }

    public function show(Request $request, Warehouse $warehouse)
    {
        return view('frontend.website.warehouses.show', [
            'warehouse' => $warehouse,
        ]);
    }

    public function book(Request $request)
    {
        return view('frontend.website.warehouses.book');
    }

    public function area(Request $request, $area)
    {
        $contents = HomepageContent::find(1);

        return view('frontend.website.warehouses.area', [
            'contents' => $contents,
            'area' => $area
        ]);
    }
}