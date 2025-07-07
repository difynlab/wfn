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
            'en' => 'English',
            'ar' => 'Arabic',
        ];
        $language_name = $languages[$language] ?? 'English';
        
        $dbLanguageMap = [
            'en' => 'english',
            'ar' => 'arabic'
        ];
        $dbLanguage = $dbLanguageMap[$language] ?? 'english';

        View::share([
            'middleware_language' => $language,
            'middleware_language_name' => $language_name,
            'middleware_db_language' => $dbLanguage
        ]);

        session(['db_language' => $dbLanguage]);

        // $request->merge([
        //     'middleware_language' => $language,
        //     'middleware_language_name' => $language_name,
        // ]);

        return $next($request);
    }
}
