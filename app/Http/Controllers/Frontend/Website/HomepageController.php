<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageContent;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\StorageType;
use App\Models\Subscription;
use App\Models\Warehouse;
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

        return view('frontend.website.homepage', [
            'contents' => $contents,
            'riyadh_warehouses' => $riyadh_warehouses,
            'jeddah_warehouses' => $jeddah_warehouses,
            'mecca_warehouses' => $mecca_warehouses,
            'medina_warehouses' => $medina_warehouses,
			'articles' => $articles,
			'storage_types' => $storage_types,
        ]);
    }

    public function subscriptions(Request $request)
    {
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

        return redirect()->route('homepage')->with(
            [
                'success' => 'Successfully Subscribed',
                'message' => 'You will receive our newsletters regularly.',
            ]
        );
    }
}