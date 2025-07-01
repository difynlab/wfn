<?php

use App\Http\Middleware\RedirectIfAuthenticatedMiddleware;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\LanguageMiddleware;
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
            Route::middleware('web')->name('landlord.')->group(base_path('routes/backend/landlord.php'));
            Route::middleware('web')->name('tenant.')->group(base_path('routes/backend/tenant.php'));

            Route::middleware('web')->name('frontend-auth.')->group(base_path('routes/frontend/auth.php'));
            Route::middleware('web')->name('website.')->group(base_path('routes/frontend/website.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectTo(function ($request) {
            if($request->is('admin/*') || $request->is('manager/*') || $request->is('landlord/*')) {
                return route('backend-auth.portal.login');
            }
            return route('frontend-auth.login');
        });

        $middleware->alias([
            'language' => LanguageMiddleware::class,
            'role' => RoleMiddleware::class,
            'redirect' => RedirectIfAuthenticatedMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();