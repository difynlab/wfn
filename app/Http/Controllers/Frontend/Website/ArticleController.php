<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArticleContent;
use App\Models\Article;
use App\Models\ArticleCategory;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $contents = ArticleContent::find(1);
        
        $dbLanguage = session('db_language', 'english');
        
        $categories = ArticleCategory::where('status', 1)
            ->where('language', $dbLanguage)
            ->get();
            
        $categoryIds = $categories->pluck('id')->toArray();
        
        $articles = Article::with('articleCategory')
            ->where('status', 1)
            ->whereIn('article_category_id', $categoryIds)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.website.articles.index', [
            'contents' => $contents,
            'articles' => $articles,
            'categories' => $categories
        ]);
        
    }

    public function show(Request $request)
    {
        $contents = ArticleContent::find(1);
        
        return view('frontend.website.articles.show', [
            'contents' => $contents
        ]);
    }
}