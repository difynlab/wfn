<?php

namespace App\Http\Controllers\Backend\Admin\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    private function processData($items)
    {
        foreach($items as $item) {
            $item->action = '
            <a href="'. route('admin.articles.edit', $item->id) .'" class="action-button edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$item->id.'" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $item->thumbnail = $item->thumbnail ? '<img src="'. asset('storage/backend/articles/' . $item->thumbnail) .'" class="table-image">' : '<img src="'. asset('storage/backend/global/' . Setting::find(1)->no_image) .'" class="table-image">';

            $item->status = ($item->status == 1) ? '<span class="status active-status">Active</span>' : '<span class="status inactive-status">Inactive</span>';
        }

        return $items;
    }

    public function index(Request $request)
    {
        $article_categories = ArticleCategory::where('status', '1')->get();

        $pagination = $request->pagination ?? 10;
        $items = Article::orderBy('id', 'desc')->paginate($pagination);
        $items = $this->processData($items);

        return view('backend.admin.articles.index', [
            'items' => $items,
            'pagination' => $pagination,
            'article_categories' => $article_categories
        ]);
    }

    public function create()
    {
        $article_categories = ArticleCategory::where('status', '1')->get();

        return view('backend.admin.articles.create', [
            'article_categories' => $article_categories
        ]);
    }
                                                                              
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3|max:250',
            'article_category_id' => 'required',
            'author_name' => 'required|min:3|max:250',
            'content' => 'required',
            'new_thumbnail' => 'nullable|max:30720',
            'status' => 'required|in:0,1',
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Creation Failed!',
                'route' => route('admin.articles.index')
            ]);
        }

        if($request->file('new_thumbnail')) {
            $thumbnail = $request->file('new_thumbnail');
            $thumbnail_name = Str::random(40) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->storeAs('backend/articles', $thumbnail_name);
        }
        else {
            $thumbnail_name = $request->old_thumbnail;
        }

        $data = $request->except(
            'old_thumbnail',
            'new_thumbnail',
        );
        $data['thumbnail'] = $thumbnail_name;
        $article = Article::create($data); 

        return redirect()->route('admin.articles.edit', $article)->with([
            'success' => "Update Successful!",
            'route' => route('admin.articles.index')
        ]);
    }

    public function edit(Article $article)
    {
        $article_categories = ArticleCategory::where('status', '1')->get();

        return view('backend.admin.articles.edit', [
            'article' => $article,
            'article_categories' => $article_categories
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3|max:250',
            'article_category_id' => 'required',
            'author_name' => 'required|min:3|max:250',
            'content' => 'required',
            'new_thumbnail' => 'nullable|max:30720',
            'status' => 'required|in:0,1',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('admin.articles.index')
            ]);
        }

        if($request->file('new_thumbnail')) {
            if($request->old_thumbnail) {
                Storage::delete('backend/articles/' . $request->old_thumbnail);
            }

            $thumbnail = $request->file('new_thumbnail');
            $thumbnail_name = Str::random(40) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->storeAs('backend/articles', $thumbnail_name);
        }
        else if($request->old_thumbnail == null) {
            if($article->thumbnail) {
                Storage::delete('backend/articles/' . $article->thumbnail);
            }
            $thumbnail_name = null;
        }
        else {
            $thumbnail_name = $request->old_thumbnail;
        }

        $data = $request->except(
            'old_thumbnail',
            'new_thumbnail',
        );
        $data['thumbnail'] = $thumbnail_name;
        $article->fill($data)->save();
        
        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('admin.articles.index')
        ]);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->back()->with('delete', 'Successfully Deleted!');
    }

    public function filter(Request $request)
    {
        $title = $request->title;
        $category = $request->category;
        $status = $request->status;
        $column = $request->column ?? 'id';
        $direction = $request->direction ?? 'desc';

        $valid_columns = ['title', 'status', 'id'];
        $valid_directions = ['asc', 'desc'];

        if(!in_array($column, $valid_columns)) {
            $column = 'id';
        }

        if(!in_array($direction, $valid_directions)) {
            $direction = 'desc';
        }

        $items = Article::orderBy($column, $direction);

        if($title) {
            $items->where('title', 'like', '%' . $title . '%');
        }

        if($category) {
            $items->where('article_category_id', $category);
        }

        if($status != null) {
            $items->where('status', $status);
        }

        $pagination = $request->pagination ?? 10;
        $items = $items->paginate($pagination);
        $items = $this->processData($items);

        if($request->ajax()) {
            $tbodyView = view('backend.admin.articles._tbody', compact('items'))->render();
            $paginationView = $items->appends($request->except('page'))->links("pagination::bootstrap-5")->render();

            return response()->json([
                'tbody' => $tbodyView,
                'pagination' => $paginationView,
            ]);
        }

        $article_categories = ArticleCategory::where('status', '1')->get();

        return view('backend.admin.articles.index', [
            'items' => $items,
            'pagination' => $pagination,
            'title' => $title,
            'category' => $category,
            'status' => $status,
            'article_categories' => $article_categories
        ]);
    }
}