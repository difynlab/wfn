<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
use App\Models\HomepageContent;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.website.warehouses.index');
    }

    public function show(Request $request)
    {
        return view('frontend.website.warehouses.show');
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