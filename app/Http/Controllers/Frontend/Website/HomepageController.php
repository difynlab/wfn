<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageContent;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $contents = HomepageContent::find(1);

        return view('frontend.website.homepage', [
            'contents' => $contents
        ]);
    }
}