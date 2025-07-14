<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LanguageMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $language = session('language', 'en');
        $languages = [
            'en' => 'english',
            'ar' => 'arabic',
        ];
        $language_name = $languages[$language] ?? 'english';

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
