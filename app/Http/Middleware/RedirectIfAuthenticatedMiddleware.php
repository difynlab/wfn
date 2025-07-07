<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticatedMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()) {
            $role = Auth::user()->role;

            if($role == 'admin') {
                return redirect()->route('admin.dashboard');
            }
            elseif($role == 'landlord') {
                return redirect()->route('landlord.dashboard');
            }
            else {
                return redirect()->route('tenant.dashboard');
            }
        }

        return $next($request);
    }
}
