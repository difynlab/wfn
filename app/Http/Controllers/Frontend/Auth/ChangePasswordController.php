<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        return view('frontend.auth.change-password', [
            'student' => $student
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ], [
            'password.required' => 'The password field is required',
            'password.min' => 'The password must be at least 8 characters long',
            'confirm_password.required' => 'The confirm password field is required',
            'confirm_password.same' => 'The confirm password must match the password',
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Password update failed!');
        }
        
        $user = Auth::user();
        $user->password = $request->password;
        $user->save();

        Auth::logout();

        return redirect()->route('frontend.login')->with('success', 'Password changed successfully');
    }

}