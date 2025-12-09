<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
use App\Mail\AdminSupportMail;
use App\Mail\SupportMail;
use App\Models\Support;
use Illuminate\Http\Request;
use App\Models\SupportContent;
use App\Services\Recaptcha;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SupportController extends Controller
{
    public function index()
    {
        $contents = SupportContent::find(1);

        return view('frontend.website.support', [
            'contents' => $contents
        ]);
    }

    public function store(Request $request)
    {
        $recaptcha_token = $request->input('recaptcha_token');

        if(empty($recaptcha_token)) {
            Log::warning('reCAPTCHA token missing or empty', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'activity' => 'support',
            ]);
            
            return redirect()->back()->withErrors(['email' => 'reCAPTCHA token missing'])->withInput();
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:250',
            'phone' => 'nullable|min:0|max:255',
            'email' => 'required|email|min:3|max:255',
            'category' => 'required|in:general,accounts,billings',
            'subject' => 'required|min:3|max:255',
            'message' => 'required|min:10|max:255',
            'recaptcha_token' => 'required|string',
        ]);

        $validator->after(function ($validator) use ($request, $recaptcha_token) {
            $check = Recaptcha::verify($recaptcha_token, 'support');

            if(!$check['passes']) {
                $validator->errors()->add('name', 'reCAPTCHA verification failed.');

                Log::warning('Captcha verification failed', [
                    'ip' => $request->ip(),
                    'score' => $check['score'],
                    'activity' => 'subscription',
                    'user_agent' => $request->userAgent(),
                ]);
            }
        });

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with(
                [
                    'error' => 'Sending Failed',
                    'message' => 'Please recheck and submit again.',
                ]
            );
        }

        $data = $request->except('recaptcha_token');
        $support = Support::create($data);

        $mail_data = [
            'name'     => $request->name,
            'phone'    => $request->phone,
            'email'    => $request->email,
            'category' => $request->category,
            'subject'  => $request->subject,
            'message'  => $request->message,
        ];

        send_email(new SupportMail($mail_data), $request->email);
        send_email(new AdminSupportMail($mail_data), config('app.admin_email'));

        return redirect()->route('supports.index')->with(
            [
                'success' => 'Message Sent Successfully',
                'message' => 'We will get back to you as soon as possible.',
            ]
        );
    }
}