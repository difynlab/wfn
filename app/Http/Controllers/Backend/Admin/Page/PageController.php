<?php

namespace App\Http\Controllers\Backend\Admin\Page;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        return view('backend.admin.pages.index');
    }
}