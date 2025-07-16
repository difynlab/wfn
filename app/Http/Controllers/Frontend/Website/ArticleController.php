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
        
        $article_categories = ArticleCategory::where('status', 1)->where('language', session('middleware_language_name'))->get();

        $article_category_ids = [];
        foreach($article_categories as $key => $article_category) {
            if($article_category->articles()->exists()) {
                array_push($article_category_ids, $article_category->id);
            }
            else {
                $article_categories->forget($key);
            }
        }
        
        $articles = Article::where('status', 1)
            ->whereIn('article_category_id', $article_category_ids)
            ->orderBy('created_at', 'desc');

        return view('frontend.website.articles.index', [
            'contents' => $contents,
            'articles' => $articles,
            'article_categories' => $article_categories
        ]);
    }

    public function show(Request $request, Article $article)
    {
        $contents = ArticleContent::find(1);

        $article_category = $article->articleCategory;

        $recent_articles = $article_category->articles()->whereNot('id', $article->id)->where('status', 1)->get()->random(3);
        
        return view('frontend.website.articles.show', [
            'contents' => $contents,
            'article' => $article,
            'recent_articles' => $recent_articles
        ]);
    }
}