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
                    $message = 'Please update your company details before manage warehouses and bookings.';
                }
                else {
                    $message = 'Please update your company details before checking our warehouses.';
                }

                if($company->status == 3) {
                    return redirect()->route('landlord.settings.index')->with([
                        'active_tab' => 'company',
                        'company' => 'Company Details',
                        'message' => $message
                    ]);
                }
                elseif($company->status == 2) {
                    return redirect()->route('landlord.settings.index')->with([
                        'active_tab' => 'company',
                        'company' => 'Company Details',
                        'message' => 'The company details is under review by WFN management.'
                    ]);
                }
            }
            else {
                if($company->status == 3) {
                    return redirect()->route('tenant.settings.index')->with([
                        'active_tab' => 'company',
                        'company' => 'Company Details',
                        'message' => 'Please update your company details before checking our warehouses.'
                    ]);
                }
                elseif($company->status == 2) {
                    return redirect()->route('tenant.settings.index')->with([
                        'active_tab' => 'company',
                        'company' => 'Company Details',
                        'message' => 'The company details is under review by WFN management.'
                    ]);
                }
            }
        }

        return $next($request);
    }
}
