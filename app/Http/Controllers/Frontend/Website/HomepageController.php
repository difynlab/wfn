<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
use App\Mail\AdminSubscriptionMail;
use App\Mail\SubscriptionMail;
use Illuminate\Http\Request;
use App\Models\HomepageContent;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\StorageType;
use App\Models\Subscription;
use App\Models\Warehouse;
use App\Services\Recaptcha;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $contents = HomepageContent::find(1);

        $riyadh_warehouses = Warehouse::where('city_en', 'Riyadh')->where('status', 1)->inRandomOrder()->take(3)->get();
        $jeddah_warehouses = Warehouse::where('city_en', 'Jeddah')->where('status', 1)->inRandomOrder()->take(3)->get();
        $mecca_warehouses = Warehouse::where('city_en', 'Mecca')->where('status', 1)->inRandomOrder()->take(3)->get();
        $medina_warehouses = Warehouse::where('city_en', 'Medina')->where('status', 1)->inRandomOrder()->take(3)->get();

        $article_categories = ArticleCategory::where('status', 1)->where('language', session('middleware_language_name'))->get();

        $article_category_ids = [];
        foreach($article_categories as $key => $article_category) {
            if($article_category->articles()->exists()) {
                array_push($article_category_ids, $article_category->id);
            }
        }
        
        $articles = Article::where('status', 1)->whereIn('article_category_id', $article_category_ids)->orderBy('created_at', 'desc')->get()->take(3);

        $storage_types = StorageType::where('status', 1)->orderBy('id', 'desc')->get();

        $cities = Warehouse::get()->pluck('city_en')->unique()->toArray();

        return view('frontend.website.homepage', [
            'contents' => $contents,
            'riyadh_warehouses' => $riyadh_warehouses,
            'jeddah_warehouses' => $jeddah_warehouses,
            'mecca_warehouses' => $mecca_warehouses,
            'medina_warehouses' => $medina_warehouses,
			'articles' => $articles,
			'storage_types' => $storage_types,
			'cities' => $cities
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
                $validator->errors()->add('email', 'reCAPTCHA verification failed.');

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

        return redirect()->route('homepage.index')->with(
            [
                'success' => 'Successfully Subscribed',
                'message' => 'You will receive our newsletters regularly.',
            ]
        );
    }
}