<?php

namespace App\Http\Controllers\Backend\Article;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleCategoryController extends Controller
{
    private function processData($items)
    {
        foreach($items as $item) {
            $item->action = '
            <a href="'. route('backend.article-categories.edit', $item->id) .'" class="action-button edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$item->id.'" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $item->status = ($item->status == 1) ? '<span class="status active-status">Active</span>' : '<span class="status inactive-status">Inactive</span>';
        }

        return $items;
    }

    public function index(Request $request)
    {
        $pagination = $request->pagination ?? 10;
        $items = ArticleCategory::orderBy('id', 'desc')->paginate($pagination);
        $items = $this->processData($items);

        return view('backend.admin.article-categories.index', [
            'items' => $items,
            'pagination' => $pagination
        ]);
    }

    public function create()
    {
        return view('backend.admin.article-categories.create');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:0|max:255',
            'language' => 'required|in:english,arabic',
            'status' => 'required|in:0,1'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Creation Failed!',
                'route' => route('backend.article-categories.index')
            ]);
        }

        $data = $request->all();
        $article_category = ArticleCategory::create($data);  

        return redirect()->route('backend.article-categories.edit', $article_category)->with([
            'success' => "Update Successful!",
            'route' => route('backend.article-categories.index')
        ]);
    }

    public function edit(ArticleCategory $article_category)
    {
        return view('backend.admin.article-categories.edit', [
            'article_category' => $article_category
        ]);
    }

    public function update(Request $request, ArticleCategory $article_category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:0|max:255',
            'language' => 'required|in:english,arabic',
            'status' => 'required|in:0,1'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('backend.article-categories.index')
            ]);
        }

        $data = $request->all();
        $article_category->fill($data)->save();
        
        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('backend.article-categories.index')
        ]);
    }

    public function destroy(ArticleCategory $article_category)
    {
        $article_category->delete();

        return redirect()->back()->with('delete', 'Successfully Deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == '⟲ Reset Filter') {
            return redirect()->route('backend.article-categories.index');
        }

        $name = $request->name;
        $language = $request->language;
        $status = $request->status;

        $items = ArticleCategory::query();

        if($name) {
            $items->where('name', 'like', '%' . $name . '%');
        }

        if($language) {
            $items->where('language', $language);
        }

        if($status != null) {
            $items->where('status', $status);
        }

        $pagination = $request->pagination ?? 10;
        $items = $items->paginate($pagination);
        $items = $this->processData($items);

        return view('backend.admin.article-categories.index', [
            'items' => $items,
            'pagination' => $pagination,
            'name' => $name,
            'language' => $language,
            'status' => $status
        ]);
    }
}