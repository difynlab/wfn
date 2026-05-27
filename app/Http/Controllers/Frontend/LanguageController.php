<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function language(Request $request)
    {
        $allowed = ['en', 'ar'];
        $language = $request->input('language');

        if (!in_array($language, $allowed, true)) {
            return response()->json(['success' => false, 'error' => 'Invalid language'], 422);
        }

        session(['language' => $language]);

        return response()->json([
            'success' => true,
            'redirect_url' => route('homepage.index')
        ]);
    }
}