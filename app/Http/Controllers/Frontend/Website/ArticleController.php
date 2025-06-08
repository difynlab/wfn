<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.website.articles.index');
    }

    public function show(Request $request)
    {
        return view('frontend.website.articles.show');
    }
}