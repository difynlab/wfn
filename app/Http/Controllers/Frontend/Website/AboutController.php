<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
use App\Models\AboutContent;
use App\Models\Review;

class AboutController extends Controller
{
    public function index()
    {
        $contents = AboutContent::find(1);
        $reviews = Review::where('status', 1)->where('language', session('middleware_language_name'))->get();

        return view('frontend.website.about', [
            'contents' => $contents,
            'reviews' => $reviews
        ]);
    }
}