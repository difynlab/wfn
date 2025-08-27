<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuthenticationContent;
use App\Services\Recaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function login()
    {
        $contents = AuthenticationContent::find(1);

        return view('frontend.auth.login', [
            'contents' => $contents
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'recaptcha_token' => 'required|string',
        ]);

        $validator->after(function ($validator) use ($request) {
            $check = Recaptcha::verify($request->input('recaptcha_token'), 'login');

            if(!$check['passes']) {
                $validator->errors()->add('email', 'reCAPTCHA verification failed.');

                Log::warning('Captcha verification failed', [
                    'ip' => $request->ip(),
                    'score' => $check['score'],
                    'activity' => 'login',
                    'user_agent' => $request->userAgent(),
                ]);
            }
        });

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $credentials = $request->only('email', 'password');
        $credentials['status'] = 1;

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if($user->role == 'landlord' || $user->role == 'tenant') {
                return redirect()->route('homepage.index');
            }
            else {
                Auth::logout();
                return redirect()->route('login')->withInput()->with(
                    [
                        'error' => 'Unauthorized Access',
                        'message' => 'You cannot access that URL.',
                    ]
                );
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

        return redirect()->route('login');
    }
}
