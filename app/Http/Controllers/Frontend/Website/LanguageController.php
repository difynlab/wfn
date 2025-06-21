<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function setLanguage(Request $request)
    {
        $language = $request->language;
        session(['language' => $language]);

        return response()->json([
            'success' => true,
            'redirect_url' => route('website.homepage')
        ]);
    }
}