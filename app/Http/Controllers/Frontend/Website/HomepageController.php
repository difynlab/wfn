<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageContent;
use App\Models\Article;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $contents = HomepageContent::find(1);

        $articles = Article::where('status', 1)
							->orderBy('created_at', 'desc') 
                            ->take(3)
                            ->get();

        return view('frontend.website.homepage', [
            'contents' => $contents,
			'articles' => $articles
        ]);
    }
}