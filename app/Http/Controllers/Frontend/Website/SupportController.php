<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;
use App\Models\SupportContent;
use Illuminate\Support\Facades\Validator;

class SupportController extends Controller
{
    public function index(Request $request)
    {
        $contents = SupportContent::find(1);

        return view('frontend.website.support', [
            'contents' => $contents
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:250',
            'phone' => 'nullable|min:0|max:255',
            'email' => 'required|email|min:3|max:255',
            'category' => 'required|in:general,accounts,billings',
            'subject' => 'required|min:3|max:255',
            'message' => 'required|min:10|max:255'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with(
                [
                    'error' => 'Sending Failed',
                    'message' => 'Please recheck and submit again.',
                ]
            );
        }

        $data = $request->all();
        $support = Support::create($data);  

        return redirect()->route('supports.index')->with(
            [
                'success' => 'Message Sent Successfully',
                'message' => 'We will get back to you as soon as possible.',
            ]
        );
    }
}