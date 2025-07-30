<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
use App\Mail\AdminSubscriptionMail;
use App\Mail\SubscriptionMail;
use App\Models\AboutContent;
use App\Models\Review;
use App\Models\Subscription;
use Illuminate\Http\Request;
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

    public function subscriptions(Request $request)
    {
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
        ]);

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

        Mail::to($request->email)->send(new SubscriptionMail($mail_data));
        Mail::to(config('app.admin_email'))->send(new AdminSubscriptionMail($mail_data));

        return redirect()->route('about')->with(
            [
                'success' => 'Successfully Subscribed',
                'message' => 'You will receive our newsletters regularly.',
            ]
        );
    }
}