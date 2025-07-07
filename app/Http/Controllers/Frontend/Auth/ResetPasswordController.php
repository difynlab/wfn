<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuthenticationContent;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    public function index($email, $token)
    {
        $contents = AuthenticationContent::find(1);
        
        $reset_password = PasswordResetToken::where('email', $email)->orderBy('created_at', 'desc')->first();

        if(!$reset_password || $reset_password->token !== $token) {
            abort(404);
        }

        return view('frontend.auth.reset-password', [
            'email' => $email,
            'token' => $token,
            'contents' => $contents
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'token' => 'required'
        ]);
    
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $reset_password = PasswordResetToken::where('email', $request->email)->orderBy('created_at', 'desc')->first();

        if(!$reset_password || $reset_password->token !== $request->token) {
            return redirect()->back()->with('error', 'Invalid or expired reset token');
        }

        $user = User::where('email', $request->email)->first();
        if($user) {
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('login')->with(
                [
                    'success' => "Password Changed",
                    'message' => "Please login to your account.",
                ]
            );

        }

        return redirect()->back()->with('email', 'Email not found');
    }
}
