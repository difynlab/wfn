<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyStorageController extends Controller
{
    public function index(Request $request)
    {
        $student = Auth::user();

        $type = $request->query('type', 'All');
        
        $query = Media::where('location', 'Student Center')->where('language', $request->middleware_language_name)->where('status', '1')->orderBy('id', 'desc');

        if($type !== 'All') {
            $query->where('type', $type);
        }
        $medias = $query->paginate(5)->appends(['type' => $type]);
        
        return view('frontend.student.my-storage', [
            'medias' => $medias,
            'student' => $student,
            'type' => $type
        ]);
    }
}