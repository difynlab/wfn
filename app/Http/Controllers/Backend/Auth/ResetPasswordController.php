<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    public function create($email, $token)
    {
        $reset_password = PasswordResetToken::where('email', $email)->whereNotNull('token')->orderBy('created_at', 'desc')->first();

        if(!$reset_password || $reset_password->token !== $token) {
            abort(404);
        }

        return view('backend.auth.reset-password', [
            'email' => $email,
            'token' => $token
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'token' => 'required'
        ], [
            'password.min' => 'The password must be at least 8 characters long',
            'confirm_password.same' => 'The confirm password must match the password'
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
            $user->password = $request->password;
            $user->save();

            return redirect()->route('backend.login')->with('success', 'Password has been reset successfully');
        }

        return redirect()->back()->with('email', 'The email does not exist in the database');
    }
}
