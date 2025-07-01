<?php

namespace App\Http\Controllers\Backend\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        
        $pagination = $request->pagination ?? 10;
        $items = $user->todos()->orderBy('id', 'desc')->paginate($pagination);

        return view('backend.landlord.todos.index', [
            'items' => $items,
            'pagination' => $pagination
        ]);
    }

    public function create()
    {
        return view('backend.landlord.todos.create');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:0|max:255'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Creation Failed!',
                'route' => route('landlord.todos.index')
            ]);
        }

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $todo = Todo::create($data);  

        return redirect()->route('landlord.todos.index');
    }

    public function complete(Request $request, Todo $todo)
    {
        $todo->complete = $request->complete;
        $todo->save();

        return response()->json(['success' => true]);
    }

    public function favorite(Todo $todo)
    {
        $todo->favorite = !$todo->favorite;
        $todo->save();

        return response()->json(['success' => true, 'favorite' => $todo->favorite]);
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response()->json(['success' => true]);
    }
}