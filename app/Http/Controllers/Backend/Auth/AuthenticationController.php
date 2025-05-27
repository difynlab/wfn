<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('backend.auth.login');
    }

    public function store(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            if(Auth::user()->role == 'admin') {
                return redirect()->route('backend.dashboard.index');
            }
        }

        return back()->withErrors([
            'login_failed' => 'These credentials do not match our records',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('backend-auth.login');
    }
}
