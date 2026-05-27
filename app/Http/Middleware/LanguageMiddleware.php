<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LanguageMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $languages = [
            'en' => 'english',
            'ar' => 'arabic',
        ];

        $language = session('language');

        if (!is_string($language) || !array_key_exists($language, $languages)) {
            $language = 'en';
        }
        $language_name = $languages[$language];

        View::share([
            'middleware_language' => $language,
            'middleware_language_name' => $language_name
        ]);

        session(
            [
                'middleware_language' => $language,
                'middleware_language_name' => $language_name,
            ]
        );

        return $next($request);
    }
}
