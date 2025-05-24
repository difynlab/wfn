<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseFinalExam;
use App\Models\CourseFinalExamAnswer;
use App\Models\CourseFinalExamQuestion;
use App\Models\CoursePurchase;
use Carbon\Carbon;
use App\Mail\ExamResultMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class FinalExamController extends Controller
{
    public function index(Course $course)
    {
        $questions = CourseFinalExamQuestion::where('course_id', $course->id)->where('status', '1')->inRandomOrder()->get();
        
        return view('frontend.student.courses.final-exam', [
            'course' => $course,
            'questions' => $questions
        ]);
    }

    public function store(Request $request, Course $course)
    {
        $student = Auth::user();
        $answers = $request->answers;

        $questions = CourseFinalExamQuestion::where('course_id', $course->id)->where('status', '1')->get();

        $total_questions = $questions->count();
        $total_answers = $answers ? count($answers) : 0;
        $total_correct_answers = 0;

        $course_final_exam = new CourseFinalExam();
        $course_final_exam->user_id = $student->id;
        $course_final_exam->course_id = $course->id;
        $course_final_exam->total_questions = $total_questions;
        $course_final_exam->total_un_attended_answers = $total_questions - $total_answers;
        $course_final_exam->status = '1';
        $course_final_exam->save();

        foreach($questions as $question) {
            $course_final_exam_answer = new CourseFinalExamAnswer();
            $course_final_exam_answer->course_final_exam_id = $course_final_exam->id;
            $course_final_exam_answer->course_final_question_id = $question->id;

            if(isset($answers[$question->id])) {
                $course_final_exam_answer->selected_option = $answers[$question->id];
                $course_final_exam_answer->is_correct = ($answers[$question->id] === $question->answer) ? 'Yes' : 'No';

                if($answers[$question->id] === $question->answer) {
                    $total_correct_answers++;
                }
            }
            else {
                $course_final_exam_answer->selected_option = null;
                $course_final_exam_answer->is_correct = 'No';
            }
            
            $course_final_exam_answer->save();
        }

        $marks = ($total_correct_answers / $total_questions) * 100;
        $result = ($marks >= 75) ? 'Pass' : 'Fail';

        if($result == 'Pass') {
            $course_purchase = CoursePurchase::where('user_id', $student->id)->where('course_id', $course->id)->where('status', '1')->where('course_access_status', 'Active')->first();

            $course_purchase->completion_date = Carbon::now()->toDateString();
            $course_purchase->save();
        }

        $course_final_exam->total_correct_answers = $total_correct_answers;
        $course_final_exam->marks = $marks;
        $course_final_exam->result = $result;
        $course_final_exam->save();

        $mail_data = [
            'name' => $student->first_name . ' ' . $student->last_name,
            'type' => 'final',
            'total_questions' => $total_questions,
            'total_correct_answers' => $total_correct_answers,
            'marks' => $marks,
            'result' => $result
        ];

        Mail::to($student->email)->send(new ExamResultMail($mail_data));

        return redirect()->back()->with([
            'success' => 'Submission success',
            'course_final_exam_id' => $course_final_exam->id
        ]);

    }

    public function results(Course $course, CourseFinalExam $course_final_exam)
    {
        $questions = CourseFinalExamQuestion::where('course_id', $course->id)->where('status', '1')->get();
        $provided_answers = CourseFinalExamAnswer::where('course_final_exam_id', $course_final_exam->id)->get();

        $questions_answers = $questions->map(function ($question) use ($provided_answers) {
            $provided_answer = $provided_answers->firstWhere('course_final_question_id', $question->id);

            return [
                'id' => $question->id,
                'question' => $question->question,
                'options' => [
                    'A' => $question->option_a,
                    'B' => $question->option_b,
                    'C' => $question->option_c,
                    'D' => $question->option_d,
                ],
                'correct_answer' => $question->answer,
                'selected_answer' => $provided_answer->selected_option ?? null,
                'is_correct' => $provided_answer->is_correct ?? 'No',
            ];
        });

        return view('frontend.student.courses.final-exam-result', [
            'course' => $course,
            'course_final_exam' => $course_final_exam,
            'questions_answers' => $questions_answers
        ]);
    }
}