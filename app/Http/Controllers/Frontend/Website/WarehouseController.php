<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
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

    public function area(Request $request)
    {
        return view('frontend.website.warehouses.area');
    }
}