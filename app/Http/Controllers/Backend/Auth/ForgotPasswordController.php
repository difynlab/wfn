<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Mail\AccountForgotPasswordMail;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('backend.auth.forgot-password');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->email)->where('status', 1)->first();

        if(!$user) {
            return redirect()->back()->withErrors(['email' => 'Email not found.'])->withInput();
        }

        if($user->role != 'admin') {
            return redirect()->back()->withErrors(['email' => 'Unauthorized email.'])->withInput();
        }

        do {
            $token = bin2hex(random_bytes(30));
        } while (PasswordResetToken::where('token', $token)->exists());

        $password_reset = new PasswordResetToken();
        $password_reset->email = $request->email;
        $password_reset->token = $token;
        $password_reset->save();

        $mail_data = [
            'name' => $user->first_name . ' ' . $user->last_name,
            'email' => $user->email,
            'token' => $token,
        ];

        Mail::to([$request->email])->send(new AccountForgotPasswordMail($mail_data));

        return redirect()->back()->with('forgot-password', "Email sent successfully");
    }
}
