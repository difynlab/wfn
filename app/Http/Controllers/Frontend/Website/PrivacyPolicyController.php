<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicyContent;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $contents = PrivacyPolicyContent::find(1);

        return view('frontend.website.privacy-policy', [
            'contents' => $contents
        ]);
    }
}