<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use App\Models\TechnicalSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TechnicalSupportController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        return view('frontend.student.technical-supports', [
            'student' => $student
        ]);
    }

    public function store(Request $request)
    {
        $technical_support = new TechnicalSupport();
        $technical_support->user_id = Auth::user()->id;
        $technical_support->subject = $request->subject;
        $technical_support->message = $request->message;
        $technical_support->status = '1';
        $technical_support->save();

        return redirect()->back()->with('success', 'Message sent successfully');
    }
}
