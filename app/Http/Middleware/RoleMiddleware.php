<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = Auth::user();

        if($user->role != $role) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            if($role == 'admin') {
                return redirect()->route('admin.login')->withInput()->with(
                    [
                        'error' => 'Unauthorized Access',
                        'message' => 'You cannot access that URL.',
                    ]
                );
            }
            else {
                return redirect()->route('login')->withInput()->with(
                    [
                        'error' => 'Unauthorized Access',
                        'message' => 'You cannot access that URL.',
                    ]
                );
            }
        }

        return $next($request);
    }
}
