<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupportContent;

class SupportController extends Controller
{
    public function index(Request $request)
    {
        $contents = SupportContent::find(1);

        return view('frontend.website.support', [
            'contents' => $contents
        ]);
    }
}