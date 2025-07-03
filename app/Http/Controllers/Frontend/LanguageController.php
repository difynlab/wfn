<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function language(Request $request)
    {
        $language = $request->language;
        session(
            [
                'language' => $language
            ]
        );

        return response()->json([
            'success' => true,
            'redirect_url' => route('frontend.homepage')
        ]);
    }
}