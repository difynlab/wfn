<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('backend.auth.login');
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

            if(in_array($user->role, ['admin', 'manager', 'landlord'])) {
                return redirect()->intended("/{$user->role}/dashboard");
            }
            else {
                Auth::logout();
                return redirect()->route('backend-auth.portal.login')->withInput()->with('error', 'Unauthorized');
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

        return redirect()->route('backend-auth.portal.login');
    }
}
