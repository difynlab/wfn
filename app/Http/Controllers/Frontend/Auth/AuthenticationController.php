<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuthenticationContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('frontend.auth.login');
    }

    public function store(Request $request)
    {
        $contents = AuthenticationContent::find(1);

        $request->session()->regenerate();

    $user = Auth::user();

    // Role check and redirection
    if ($user->role === 'user') {
        return redirect()->intended('/dashboard');
    } else {
        Auth::logout();
        return redirect()->route('user.login')->withErrors(['email' => 'Unauthorized.']);
    }

        if(Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            if(Auth::user()->role == 'student') {
                $redirect_url = $request->redirect ?? route('frontend.dashboard.index');
        
                return redirect()->intended($redirect_url);
            }
        }

        return back()->withErrors([
            'contents' => $contents,
            'login_failed' => 'These credentials do not match our records',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('frontend.homepage');
    }
}
