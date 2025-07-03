<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\FrontendResetPasswordMail;
use App\Models\AuthenticationContent;

class ForgotPasswordController extends Controller
{
    public function index()
    { 
        $contents = AuthenticationContent::find(1);

        return view('frontend.auth.forgot-password', [
            'contents' => $contents
        ]);
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

        if(!in_array($user->role, ['landlord', 'tenant'])) {
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
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'token' => $token,
        ];

        Mail::to([$request->email])->send(new FrontendResetPasswordMail($mail_data));

        return redirect()->back()->with([
            'success' => "Email sent successfully",
            'message' => "Please check your inbox and follow the steps to reset your password.",
        ]);
    }
}
