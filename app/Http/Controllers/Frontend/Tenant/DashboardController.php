<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    { 
        $student = Auth::user();
        $date = Carbon::now()->format('F d Y');
    
        return view('frontend.student.dashboard', [
            'student' => $student,
            'date' => $date
        ]);
    }
}