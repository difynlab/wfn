<?php

namespace App\Http\Controllers\Backend\Admin\Article;

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
            <a href="'. route('admin.article-categories.edit', $item->id) .'" class="action-button edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$item->id.'" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            switch ($item->status) {
                case 1:
                    $item->status = '<span class="status active-status">Active</span>';
                    break;

                case 2:
                    $item->status = '<span class="status pending-status">Pending</span>';
                    break;

                default:
                    $item->status = '<span class="status inactive-status">Inactive</span>';
                    break;
            }
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
            'status' => 'required|in:0,1,2'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Creation Failed!',
                'route' => route('admin.article-categories.index')
            ]);
        }

        $data = $request->all();
        $article_category = ArticleCategory::create($data);  

        return redirect()->route('admin.article-categories.edit', $article_category)->with([
            'success' => "Update Successful!",
            'route' => route('admin.article-categories.index')
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
            'status' => 'required|in:0,1,2'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('admin.article-categories.index')
            ]);
        }

        $data = $request->all();
        $article_category->fill($data)->save();
        
        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('admin.article-categories.index')
        ]);
    }

    public function destroy(ArticleCategory $article_category)
    {
        $article_category->delete();

        return redirect()->back()->with('delete', 'Successfully Deleted!');
    }

    public function filter(Request $request)
    {
        $name = $request->name;
        $language = $request->language;
        $status = $request->status;
        $column = $request->column ?? 'id';
        $direction = $request->direction ?? 'desc';

        $valid_columns = ['name', 'language', 'status', 'id'];
        $valid_directions = ['asc', 'desc'];

        if(!in_array($column, $valid_columns)) {
            $column = 'id';
        }

        if(!in_array($direction, $valid_directions)) {
            $direction = 'desc';
        }

        $items = ArticleCategory::orderBy($column, $direction);

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

        if($request->ajax()) {
            $tbodyView = view('backend.admin.article-categories._tbody', compact('items'))->render();
            $paginationView = $items->appends($request->except('page'))->links("pagination::bootstrap-5")->render();

            return response()->json([
                'tbody' => $tbodyView,
                'pagination' => $paginationView,
            ]);
        }

        return view('backend.admin.article-categories.index', [
            'items' => $items,
            'pagination' => $pagination,
            'name' => $name,
            'language' => $language,
            'status' => $status
        ]);
    }
}