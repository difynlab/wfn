<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('frontend.auth.login');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $credentials = $request->only('email', 'password');
        $credentials['status'] = '1';

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if($user->role == 'tenant') {
                return redirect()->intended("/tenant/dashboard");
            }
            else {
                Auth::logout();
                return redirect()->route('frontend-auth.login')->withInput()->with('error', 'Unauthorized');
            }
        }

        return back()->withInput()->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('frontend-auth.login');
    }
}
