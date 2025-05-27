<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function create()
    {
        return view('backend.auth.forgot-password');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                function($attribute, $value, $fail) {
                    $user = User::where('email', $value)->where('role', 'admin')->first();
                    if(!$user) {
                        $fail('The email does not belong to an admin or does not exist in the database');
                    }
                },
            ],
        ], [
            'email.required' => 'The email field is required',
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Reset password request failed');
        }

        $token = Str::random(40) . microtime(true);
        $token = Str::substr(md5($token), 0, 60);

        $password_reset = new PasswordResetToken();
        $password_reset->email = $request->email;
        $password_reset->token = $token;
        $password_reset->save();

        $user = User::where('email', $request->email)->where('role', 'admin')->where('status', '1')->first();
        $role = $user->role;

        $mail_data = [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'token' => $token,
        ];

        Mail::to([$request->email])->send(new ResetPasswordMail($mail_data, $role));

        return redirect()->back()->with('success', "Email sent successfully");
    }
}
