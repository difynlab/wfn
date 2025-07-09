<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\MessageReply;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    private function processData($items)
    {
        foreach($items as $item) {
            $item->name = $item->user->first_name . ' ' . $item->user->last_name;

            $time = Carbon::createFromFormat('H:i:s', $item->time);
            $item->time = $time->format('h:i A');
        }

        return $items;
    }

    public function index(Request $request, $category)
    {
        $pagination = $request->pagination ?? 10;

        $all_count = Message::where('status', 1)->get()->count();
        $general_count = Message::where('status', 1)->where('category', 'general')->get()->count();
        $landlord_count = Message::where('status', 1)->where('category', 'landlord')->get()->count();
        $tenant_count = Message::where('status', 1)->where('category', 'tenant')->get()->count();
        $starred_count = Message::where('status', 1)->where('admin_favorite', 1)->get()->count();
        $bin_count = Message::where('status', 0)->get()->count();

        Message::where('admin_view', 0)->update(['admin_view' => 1]);

        if($category == 'all') {
            $items = Message::where('status', 1)->orderBy('id', 'desc')->paginate($pagination);
        }
        elseif($category == 'general') {
            $items = Message::where('status', 1)->where('category', 'general')->orderBy('id', 'desc')->paginate($pagination);
        }
        elseif($category == 'landlord') {
            $items = Message::where('status', 1)->where('category', 'landlord')->orderBy('id', 'desc')->paginate($pagination);
        }
        elseif($category == 'tenant') {
            $items = Message::where('status', 1)->where('category', 'tenant')->orderBy('id', 'desc')->paginate($pagination);
        }
        elseif($category == 'starred') {
            $items = Message::where('status', 1)->where('admin_favorite', 1)->orderBy('id', 'desc')->paginate($pagination);
        }
        elseif($category == 'bin') {
            $items = Message::where('status', 0)->orderBy('id', 'desc')->paginate($pagination);
        }
        
        $items = $this->processData($items);

        return view('backend.admin.messages.index', [
            'items' => $items,
            'pagination' => $pagination,
            'category' => $category,
            'all_count' => $all_count,
            'general_count' => $general_count,
            'landlord_count' => $landlord_count,
            'tenant_count' => $tenant_count,
            'starred_count' => $starred_count,
            'bin_count' => $bin_count
        ]);
    }

    public function create()
    {
        $users = User::where('status', 1)->whereNot('id', auth()->user()->id)->get();
        
        $all_count = Message::where('status', 1)->get()->count();
        $general_count = Message::where('status', 1)->where('category', 'general')->get()->count();
        $landlord_count = Message::where('status', 1)->where('category', 'landlord')->get()->count();
        $tenant_count = Message::where('status', 1)->where('category', 'tenant')->get()->count();
        $starred_count = Message::where('status', 1)->where('admin_favorite', 1)->get()->count();
        $bin_count = Message::where('status', 0)->get()->count();

        return view('backend.admin.messages.create', [
            'users' => $users,
            'all_count' => $all_count,
            'general_count' => $general_count,
            'landlord_count' => $landlord_count,
            'tenant_count' => $tenant_count,
            'starred_count' => $starred_count,
            'bin_count' => $bin_count
        ]);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'category' => 'required',
            'subject' => 'required|min:0|max:255',
            'initial_message' => 'required'
        ], [
            'initial_message' => 'The message field is required.'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Sending Failed!',
                'route' => route('admin.messages.index', 'all')
            ]);
        }

        $data = $request->all();
        $data['creator'] = auth()->user()->id;
        $data['date'] = Carbon::now()->toDateString();
        $data['time'] = Carbon::now()->toTimeString();
        $data['admin_view'] = 1;
        $message = Message::create($data);  

        return redirect()->route('admin.messages.index', 'all')->with([
            'success' => "Send Successful!",
            'route' => route('admin.messages.index', 'all')
        ]);
    }

    public function edit(Message $message)
    {
        $all_count = Message::where('status', 1)->get()->count();
        $general_count = Message::where('status', 1)->where('category', 'general')->get()->count();
        $landlord_count = Message::where('status', 1)->where('category', 'landlord')->get()->count();
        $tenant_count = Message::where('status', 1)->where('category', 'tenant')->get()->count();
        $starred_count = Message::where('status', 1)->where('admin_favorite', 1)->get()->count();
        $bin_count = Message::where('status', 0)->get()->count();

        if($message->admin_view == 0) {
            $message->admin_view = 1;
            $message->save();
        }

        $message_replies = MessageReply::where('message_id', $message->id)->where('status', 1)->get();

        $date_time_string = $message->date . ' ' . $message->time;
        $parsed_date_time = Carbon::parse($date_time_string);
        $time_ago = $parsed_date_time->diffForHumans();
        $message->time_difference = $time_ago;

        foreach($message_replies as $message_reply) {
            $message_reply->admin_view = 1;
            $message_reply->save();

            $date_time_string = $message_reply->date . ' ' . $message_reply->time;
            $parsed_date_time = Carbon::parse($date_time_string);
            $time_ago = $parsed_date_time->diffForHumans();
            $message_reply->time_difference = $time_ago;
        }

        return view('backend.admin.messages.edit', [
            'message' => $message,
            'message_replies' => $message_replies,
            'user' => $message->user,
            'all_count' => $all_count,
            'general_count' => $general_count,
            'landlord_count' => $landlord_count,
            'tenant_count' => $tenant_count,
            'starred_count' => $starred_count,
            'bin_count' => $bin_count
        ]);
    }

    public function update(Request $request, Message $message)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Sending Failed!',
                'route' => route('admin.messages.index', 'all')
            ]);
        }

        $message_reply = new MessageReply();
        $message_reply->message_id = $message->id;
        $message_reply->replier = auth()->user()->id;
        $message_reply->message = $request->message;
        $message_reply->date = Carbon::now()->toDateString();
        $message_reply->time = Carbon::now()->toTimeString();
        $message_reply->admin_view = 1;
        $message_reply->user_view = 0;
        $message_reply->status = 1;
        $message_reply->save();
        
        return redirect()->back();
    }

    public function filter(Request $request, $category)
    {
        $text = $request->text;

        $all_count = Message::where('status', 1)->get()->count();
        $general_count = Message::where('status', 1)->where('category', 'general')->get()->count();
        $landlord_count = Message::where('status', 1)->where('category', 'landlord')->get()->count();
        $tenant_count = Message::where('status', 1)->where('category', 'tenant')->get()->count();
        $starred_count = Message::where('status', 1)->where('admin_favorite', 1)->get()->count();
        $bin_count = Message::where('status', 0)->get()->count();

        if($category == 'all') {
            $items = Message::where('status', 1)->orderBy('id', 'desc');
        }
        elseif($category == 'general') {
            $items = Message::where('status', 1)->where('category', 'general')->orderBy('id', 'desc');
        }
        elseif($category == 'landlord') {
            $items = Message::where('status', 1)->where('category', 'landlord')->orderBy('id', 'desc');
        }
        elseif($category == 'tenant') {
            $items = Message::where('status', 1)->where('category', 'tenant')->orderBy('id', 'desc');
        }
        elseif($category == 'starred') {
            $items = Message::where('status', 1)->where('admin_favorite', 1)->orderBy('id', 'desc');
        }
        elseif($category == 'bin') {
            $items = Message::where('status', 0)->orderBy('id', 'desc');
        }

        if($text) {
            $items->where('subject', 'like', '%' . $text . '%');
        }

        $pagination = $request->pagination ?? 10;
        $items = $items->paginate($pagination);
        $items = $this->processData($items);

        return view('backend.admin.messages.index', [
            'items' => $items,
            'pagination' => $pagination,
            'text' => $text,
            'category' => $category,
            'all_count' => $all_count,
            'general_count' => $general_count,
            'landlord_count' => $landlord_count,
            'tenant_count' => $tenant_count,
            'starred_count' => $starred_count,
            'bin_count' => $bin_count
        ]);
    }

    public function favorite(Message $message)
    {
        $message->admin_favorite = !$message->admin_favorite;
        $message->save();

        return response()->json(['success' => true, 'favorite' => $message->favorite]);
    }

    public function bulkFavorite(Request $request)
    {
        foreach($request->selected_ids as $id) {
            $message = Message::find($id);
            $message->admin_favorite = !$message->admin_favorite;
            $message->save();
        }

        return response()->json(['success' => true]);
    }

    public function bulkDestroy(Request $request)
    {
        foreach($request->selected_ids as $id) {
            $message = Message::find($id);

            if($message->status == 0) {
                $message->delete();
            }
            else {
                $message->status = 0;
                $message->save();
            }
        }

        return response()->json(['success' => true]);
    }

    public function bulkRecover(Request $request)
    {
        foreach($request->selected_ids as $id) {
            $message = Message::find($id);
            $message->status = 1;
            $message->save();
        }

        return response()->json(['success' => true]);
    }
}