<?php

namespace App\Http\Controllers\Backend\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\MessageReply;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    private function processData($items)
    {
        foreach($items as $item) {
            $creator = User::where('status', 1)->find($item->creator);

            if($item->creator != auth()->user()->id) {
                $item->name = $creator->first_name . ' ' . $creator->last_name;
            }
            else {
                $item->name = 'Me';
            }

            $time = Carbon::createFromFormat('H:i:s', $item->time);
            $item->time = $time->format('h:i A');
        }

        return $items;
    }

    public function index(Request $request, $category)
    {
        $user = Auth::user();
        $pagination = $request->pagination ?? 10;

        $all_count = $user->messages()->where('user_status', 1)->get()->count();
        $starred_count = $user->messages()->where('user_status', 1)->where('user_favorite', 1)->get()->count();
        $bin_count = $user->messages()->where('user_status', 0)->get()->count();

        Message::where('user_id', auth()->user()->id)->where('user_view', 0)->update(['user_view' => 1]);

        if($category == 'all') {
            $items = $user->messages()->where('user_status', 1)->orderBy('id', 'desc')->paginate($pagination);
        }
        elseif($category == 'starred') {
            $items = $user->messages()->where('user_status', 1)->where('user_favorite', 1)->orderBy('id', 'desc')->paginate($pagination);
        }
        elseif($category == 'bin') {
            $items = $user->messages()->where('user_status', 0)->orderBy('id', 'desc')->paginate($pagination);
        }
        
        $items = $this->processData($items);

        return view('backend.landlord.messages.index', [
            'items' => $items,
            'pagination' => $pagination,
            'category' => $category,
            'all_count' => $all_count,
            'starred_count' => $starred_count,
            'bin_count' => $bin_count
        ]);
    }

    public function create()
    {
        $user = Auth::user();
        $all_count = $user->messages()->where('user_status', 1)->get()->count();
        $starred_count = $user->messages()->where('user_status', 1)->where('user_favorite', 1)->get()->count();
        $bin_count = $user->messages()->where('user_status', 0)->get()->count();

        return view('backend.landlord.messages.create', [
            'all_count' => $all_count,
            'starred_count' => $starred_count,
            'bin_count' => $bin_count
        ]);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|min:0|max:255',
            'initial_message' => 'required'
        ], [
            'initial_message' => 'The message field is required.'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Sending Failed!',
                'route' => route('landlord.messages.index', 'all')
            ]);
        }

        $data = $request->all();
        $data['creator'] = auth()->user()->id;
        $data['date'] = Carbon::now()->toDateString();
        $data['time'] = Carbon::now()->toTimeString();
        $data['category'] = 'landlord';
        $data['admin_view'] = 0;
        $data['user_id'] = auth()->user()->id;
        $message = Message::create($data);  

        return redirect()->route('landlord.messages.index', 'all')->with([
            'success' => "Send Successful!",
            'route' => route('landlord.messages.index', 'all')
        ]);
    }

    public function edit(Message $message)
    {
        $user = Auth::user();
        $all_count = $user->messages()->where('user_status', 1)->get()->count();
        $starred_count = $user->messages()->where('user_status', 1)->where('user_favorite', 1)->get()->count();
        $bin_count = $user->messages()->where('user_status', 0)->get()->count();

        $message_replies = MessageReply::where('message_id', $message->id)->where('status', 1)->get();

        $date_time_string = $message->date . ' ' . $message->time;
        $parsed_date_time = Carbon::parse($date_time_string);
        $time_ago = $parsed_date_time->diffForHumans();
        $message->time_difference = $time_ago;

        foreach($message_replies as $message_reply) {
            $message_reply->user_view = 1;
            $message_reply->save();

            $date_time_string = $message_reply->date . ' ' . $message_reply->time;
            $parsed_date_time = Carbon::parse($date_time_string);
            $time_ago = $parsed_date_time->diffForHumans();
            $message_reply->time_difference = $time_ago;
        }

        return view('backend.landlord.messages.edit', [
            'message' => $message,
            'message_replies' => $message_replies,
            'user' => $message->user,
            'all_count' => $all_count,
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
                'route' => route('landlord.messages.index', 'all')
            ]);
        }

        $message_reply = new MessageReply();
        $message_reply->message_id = $message->id;
        $message_reply->replier = auth()->user()->id;
        $message_reply->message = $request->message;
        $message_reply->date = Carbon::now()->toDateString();
        $message_reply->time = Carbon::now()->toTimeString();
        $message_reply->user_view = 1;
        $message_reply->save();
        
        return redirect()->back();
    }

    public function filter(Request $request, $category)
    {
        $text = $request->text;

        $user = Auth::user();
        $all_count = $user->messages()->where('user_status', 1)->get()->count();
        $starred_count = $user->messages()->where('user_status', 1)->where('user_favorite', 1)->get()->count();
        $bin_count = $user->messages()->where('user_status', 0)->get()->count();

        if($category == 'all') {
            $items = $user->messages()->where('user_status', 1)->orderBy('id', 'desc');
        }
        elseif($category == 'starred') {
            $items = $user->messages()->where('user_status', 1)->where('user_favorite', 1)->orderBy('id', 'desc');
        }
        elseif($category == 'bin') {
            $items = $user->messages()->where('user_status', 0)->orderBy('id', 'desc');
        }

        if($text) {
            $items->where('subject', 'like', '%' . $text . '%');
        }

        $pagination = $request->pagination ?? 10;
        $items = $items->paginate($pagination);
        $items = $this->processData($items);

        return view('backend.landlord.messages.index', [
            'items' => $items,
            'pagination' => $pagination,
            'text' => $text,
            'category' => $category,
            'all_count' => $all_count,
            'starred_count' => $starred_count,
            'bin_count' => $bin_count
        ]);
    }

    public function favorite(Message $message)
    {
        $message->user_favorite = !$message->user_favorite;
        $message->save();

        return response()->json(['success' => true, 'favorite' => $message->favorite]);
    }

    public function bulkFavorite(Request $request)
    {
        foreach($request->selected_ids as $id) {
            $message = Message::find($id);
            $message->user_favorite = !$message->user_favorite;
            $message->save();
        }

        return response()->json(['success' => true]);
    }

    public function bulkDestroy(Request $request)
    {
        foreach($request->selected_ids as $id) {
            $message = Message::find($id);
            // $message->user_status = 0;
            // $message->save();

            if($message->user_status == 0) {
                $message->user_status = 2;
                $message->save();
            }
            else {
                $message->user_status = 0;
                $message->save();
            }
        }

        return response()->json(['success' => true]);
    }

    public function bulkRecover(Request $request)
    {
        foreach($request->selected_ids as $id) {
            $message = Message::find($id);
            $message->user_status = 1;
            $message->save();
        }

        return response()->json(['success' => true]);
    }
}