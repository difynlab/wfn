<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermsOfUseController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.website.terms-of-use');
    }
}