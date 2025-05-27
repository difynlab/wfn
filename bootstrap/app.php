<?php

use App\Http\Middleware\SetLanguage;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')->name('backend-auth.')->group(base_path('routes/backend/auth.php'));
            Route::middleware('web')->name('admin.')->group(base_path('routes/backend/admin.php'));
            Route::middleware('web')->name('manager.')->group(base_path('routes/backend/manager.php'));
            Route::middleware('web')->name('landlord.')->group(base_path('routes/backend/landlord.php'));

            Route::middleware('web')->name('frontend-auth.')->group(base_path('routes/frontend/auth.php'));
            Route::middleware('web')->name('tenant.')->group(base_path('routes/frontend/tenant.php'));
            Route::middleware('web')->name('website.')->group(base_path('routes/frontend/website.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {        
        $middleware->alias([
            'set_language' => SetLanguage::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
