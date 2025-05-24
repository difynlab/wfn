<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Mail\RegisterMail;
use App\Mail\ReferFriendConfirmationMail;
use App\Models\AuthenticationContent;
use App\Models\ReferFriend;
use App\Models\ReferPointActivity;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register()
    {
        return view('frontend.auth.register');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ], [
            'email.unique' => 'The email address is already in use',
            'password.required' => 'The password field is required',
            'password.min' => 'The password must be at least 8 characters long',
            'confirm_password.required' => 'The confirm password field is required',
            'confirm_password.same' => 'The confirm password must match the password',
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Account creation failed!');
        }

        if($request->code) {
            $invite = ReferFriend::where('code', $request->code)->where('status', '1')->orderBy('created_at', 'desc')->first();

            $referred_by = $invite->user_id;
        }
        else {
            $referred_by = null;
        }

        $data = $request->except('code', 'confirm_password', 'middleware_language_name', 'middleware_language');
        $data['role'] = 'student';
        $data['referred_by'] = $referred_by;
        $data['status'] = '1';
        $student = User::create($data);

        if($referred_by) {
            ReferPointActivity::create([
                'refer_id' => $invite->id,
                'user_id' => $student->id,
                'referred_by_id' => $invite->user_id,
                'activity' => 'Referral account registered: ' . $student->first_name . ' ' . $student->last_name,
                'date' => Carbon::now()->toDateString(),
                'time' => Carbon::now()->toTimeString(),
                'points' => 0,
                'balance' => 0,
                'amount' => 0,
                'type' => 'Addition',
                'status' => '1'
            ]);

            $referrer = User::where('status', '1')->find($referred_by);

            $mail_data = [
                'name' => $referrer->first_name . ' ' . $referrer->last_name,
                'friend_name' => $student->first_name . ' ' . $student->last_name,
                'friend_email' => $student->email
            ];

            Mail::to($referrer->email)->send(new ReferFriendConfirmationMail($mail_data));
        }

        $mail_data = [
            'name' => $request->first_name . ' ' . $request->last_name
        ];

        Mail::to([$request->email])->send(new RegisterMail($mail_data));

        Auth::login($student);
        $request->session()->regenerate();

        return redirect()->route('frontend.dashboard.index');
    }
}