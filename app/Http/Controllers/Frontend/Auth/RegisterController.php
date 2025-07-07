<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuthenticationContent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register()
    {
        $contents = AuthenticationContent::find(1);

        return view('frontend.auth.register', [
            'contents' => $contents
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required|in:tenant,landlord',
            'first_name' => 'required|min:0|max:255',
            'last_name' => 'required|min:0|max:255',
            'email' => 'required|email|min:0|max:255|unique:users,email',
            'phone' => 'required|min:0|max:255|regex:/^\+?[0-9]+$/|unique:users,phone',
            'city' => 'required|min:0|max:255',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Registration Failed!',
                'message' => 'Please fix the issues and try again.',
            ]);
        }

        $data = $request->except('password', 'password_confirmation');
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        // $mail_data = [
        //     'name' => $request->first_name . ' ' . $request->last_name
        // ];

        // Mail::to([$request->email])->send(new RegisterMail($mail_data));

        Auth::login($user);
        $request->session()->regenerate();

        if($user->role == 'landlord') {
            return redirect()->route('landlord.dashboard');
        }
        else {
            return redirect()->route('tenant.dashboard');
        }
    }
}