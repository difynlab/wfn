<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    private function processData($items)
    {
        foreach($items as $item) {
            $item->action = '
            <a id="'.$item->id.'" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';
        }

        return $items;
    }

    public function index(Request $request)
    {
        $pagination = $request->pagination ?? 10;
        $items = Subscription::orderBy('id', 'desc')->paginate($pagination);
        $items = $this->processData($items);

        Subscription::where('is_new', 1)->update(['is_new' => 0]);

        return view('backend.admin.subscriptions.index', [
            'items' => $items,
            'pagination' => $pagination
        ]);
    }

    public function destroy(Subscription $subscription)
    {
        $subscription->delete();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        $email = $request->email;
        $column = $request->column ?? 'id';
        $direction = $request->direction ?? 'desc';

        $valid_columns = ['email', 'id'];
        $valid_directions = ['asc', 'desc'];

        if(!in_array($column, $valid_columns)) {
            $column = 'id';
        }

        if(!in_array($direction, $valid_directions)) {
            $direction = 'desc';
        }

        $items = Subscription::orderBy($column, $direction);

        if($email) {
            $items->where('email', 'like', '%' . $email . '%');
        }

        $pagination = $request->pagination ?? 10;
        $items = $items->paginate($pagination);
        $items = $this->processData($items);

        if($request->ajax()) {
            $tbodyView = view('backend.admin.subscriptions._tbody', compact('items'))->render();
            $paginationView = $items->appends($request->except('page'))->links("pagination::bootstrap-5")->render();

            return response()->json([
                'tbody' => $tbodyView,
                'pagination' => $paginationView,
            ]);
        }

        return view('backend.admin.subscriptions.index', [
            'items' => $items,
            'pagination' => $pagination,
            'email' => $email
        ]);
    }
}