<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberCornerController extends Controller
{
    public function index(Request $request)
    {
        $student = Auth::user();

        $type = $request->query('type', 'All');
        
        $query = Media::where('location', 'Member Corner')->where('language', $request->middleware_language_name)->where('status', '1')->orderBy('id', 'desc');

        if($type !== 'All') {
            $query->where('type', $type);
        }
        $medias = $query->paginate(5)->appends(['type' => $type]);

        $member_courses = Course::where('status', '1')->where('member_course', 'Yes')->orderBy('id', 'desc')->paginate(5);
        
        return view('frontend.student.member-corner', [
            'medias' => $medias,
            'student' => $student,
            'type' => $type,
            'member_courses' => $member_courses
        ]);
    }
}