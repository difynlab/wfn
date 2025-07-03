<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
use App\Models\AboutContent;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        $contents = AboutContent::find(1);

        return view('frontend.website.about', [
            'contents' => $contents
        ]);
    }
}