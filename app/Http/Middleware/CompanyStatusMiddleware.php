<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyStatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $company = $user->company;
        $role = $user->role;

        if($role == 'admin') {
            return $next($request);
        }

        if($company->status != 1) {
            if($role == 'landlord') {
                if($request->segment(1) == 'landlord') {
                    return redirect()->back()->with([
                        'company' => 'Company Details',
                        'message' => 'Please update your company details before manage warehouses and bookings.'
                    ]);
                }

                return redirect()->route('landlord.dashboard')->with([
                    'company' => 'Company Details',
                    'message' => 'Please update your company details before checking our warehouses.'
                ]);
            }
            else {
                return redirect()->route('tenant.dashboard')->with([
                    'company' => 'Company Details',
                    'message' => 'Please update your company details before checking our warehouses.'
                ]);
            }
        }

        return $next($request);
    }
}
