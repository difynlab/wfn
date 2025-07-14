<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
use App\Models\TermsOfUseContent;
use Illuminate\Http\Request;

class TermsOfUseController extends Controller
{
    public function index()
    {
        $contents = TermsOfUseContent::find(1);

        return view('frontend.website.terms-of-use', [
            'contents' => $contents
        ]);
    }
}