<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
use App\Mail\AdminSubscriptionMail;
use App\Mail\SubscriptionMail;
use App\Models\AboutContent;
use App\Models\Review;
use App\Models\Subscription;
use App\Services\Recaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    public function index()
    {
        $contents = AboutContent::find(1);
        $reviews = Review::where('status', 1)->where('language', session('middleware_language_name'))->get();

        return view('frontend.website.about', [
            'contents' => $contents,
            'reviews' => $reviews
        ]);
    }

    public function subscription(Request $request)
    {
        $recaptcha_token = $request->input('recaptcha_token');

        if(empty($recaptcha_token)) {
            Log::warning('reCAPTCHA token missing or empty', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'activity' => 'subscription',
            ]);
            
            return redirect()->back()->withErrors(['email' => 'reCAPTCHA token missing'])->withInput();
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'email' => [
                'required',
                'email',
                function($attribute, $value, $fail) {
                    if(Subscription::where('email', $value)->where('status', 1)->exists()) {
                        $fail('This email is already subscribed');
                    }
                },
            ],
            'recaptcha_token' => 'required|string',
        ]);

        $validator->after(function ($validator) use ($request, $recaptcha_token) {
            $check = Recaptcha::verify($recaptcha_token, 'subscription');

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
                    'error' => 'Subscription Failed',
                    'message' => 'Please recheck and submit again.',
                ]
            );
        }

        $subscription = new Subscription();
        $subscription->email = $request->email;
        $subscription->save();

        $mail_data = [
            'email'    => $request->email,
        ];

        send_email(new SubscriptionMail($mail_data), $request->email);
        send_email(new AdminSubscriptionMail($mail_data), config('app.admin_email'));

        return redirect()->route('about.index')->with(
            [
                'success' => 'Successfully Subscribed',
                'message' => 'You will receive our newsletters regularly.',
            ]
        );
    }
}