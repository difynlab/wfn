<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ReviewController extends Controller
{
    private function processData($items)
    {
        foreach($items as $item) {
            $item->action = '
            <a href="'. route('admin.reviews.edit', $item->id) .'" class="action-button edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
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
        $items = Review::orderBy('id', 'desc')->paginate($pagination);
        $items = $this->processData($items);

        return view('backend.admin.reviews.index', [
            'items' => $items,
            'pagination' => $pagination
        ]);
    }

    public function create()
    {
        return view('backend.admin.reviews.create');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'designation' => 'required|min:3|max:255',
            'star' => 'required|in:1,2,3,4,5',
            'language' => 'required|in:english,arabic',
            'content' => 'required|min:3|max:255',
            'new_thumbnail' => 'nullable|max:30720',
            'status' => 'required|in:0,1,2',
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Creation Failed!',
                'route' => route('admin.reviews.index')
            ]);
        }

        if($request->file('new_image')) {
            $image = $request->file('new_image');
            $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('backend/reviews', $image_name);
        }
        else {
            $image_name = $request->old_image;
        }

        $data = $request->except(
            'old_image',
            'new_image',
        );
        $data['image'] = $image_name;
        $review = Review::create($data);  

        return redirect()->route('admin.reviews.edit', $review)->with([
            'success' => "Update Successful!",
            'route' => route('admin.reviews.index')
        ]);
    }

    public function edit(Review $review)
    {
        return view('backend.admin.reviews.edit', [
            'review' => $review
        ]);
    }

    public function update(Request $request, Review $review)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'designation' => 'required|min:3|max:255',
            'star' => 'required|in:1,2,3,4,5',
            'language' => 'required|in:english,arabic',
            'content' => 'required|min:3|max:255',
            'new_thumbnail' => 'nullable|max:30720',
            'status' => 'required|in:0,1,2',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('admin.reviews.index')
            ]);
        }

        if($request->file('new_image')) {
            if($request->old_image) {
                Storage::delete('backend/reviews/' . $request->old_image);
            }

            $image = $request->file('new_image');
            $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('backend/reviews', $image_name);
        }
        else if($request->old_image == null) {
            if($review->image) {
                Storage::delete('backend/reviews/' . $review->image);
            }
            $image_name = null;
        }
        else {
            $image_name = $request->old_image;
        }

        $data = $request->except(
            'old_image',
            'new_image',
        );
        $data['image'] = $image_name;

        $review->fill($data)->save();
        
        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('admin.reviews.index')
        ]);
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->back()->with('delete', 'Successfully Deleted!');
    }

    public function filter(Request $request)
    {
        $name = $request->name;
        $language = $request->language;
        $status = $request->status;
        $column = $request->column ?? 'id';
        $direction = $request->direction ?? 'desc';

        $valid_columns = ['name', 'designation', 'content', 'language', 'status', 'id'];
        $valid_directions = ['asc', 'desc'];

        if(!in_array($column, $valid_columns)) {
            $column = 'id';
        }

        if(!in_array($direction, $valid_directions)) {
            $direction = 'desc';
        }

        $items = Review::orderBy($column, $direction);

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
            $tbodyView = view('backend.admin.reviews._tbody', compact('items'))->render();
            $paginationView = $items->appends($request->except('page'))->links("pagination::bootstrap-5")->render();

            return response()->json([
                'tbody' => $tbodyView,
                'pagination' => $paginationView,
            ]);
        }

        return view('backend.admin.reviews.index', [
            'items' => $items,
            'pagination' => $pagination,
            'name' => $name,
            'language' => $language,
            'status' => $status
        ]);
    }
}