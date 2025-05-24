<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use App\Mail\ExamResultMail;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\CourseModuleExam;
use App\Models\CourseModuleExamAnswer;
use App\Models\CourseModuleExamQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ModuleExamController extends Controller
{
    public function index(Course $course, CourseModule $course_module)
    {
        $questions = CourseModuleExamQuestion::where('course_id', $course->id)->where('module_id', $course_module->id)->where('status', '1')->inRandomOrder()->get();
        
        return view('frontend.student.courses.module-exam', [
            'course' => $course,
            'course_module' => $course_module,
            'questions' => $questions
        ]);
    }

    public function store(Request $request, Course $course, CourseModule $course_module)
    {
        $student = Auth::user();
        $answers = $request->answers;

        $questions = CourseModuleExamQuestion::where('course_id', $course->id)->where('module_id', $course_module->id)->where('status', '1')->get();

        $total_questions = $questions->count();
        $total_answers = $answers ? count($answers) : 0;
        $total_correct_answers = 0;

        $course_module_exam = new CourseModuleExam();
        $course_module_exam->user_id = $student->id;
        $course_module_exam->course_id = $course->id;
        $course_module_exam->module_id = $course_module->id;
        $course_module_exam->total_questions = $total_questions;
        $course_module_exam->total_un_attended_answers = $total_questions - $total_answers;
        $course_module_exam->status = '1';
        $course_module_exam->save();

        foreach($questions as $question) {
            $course_module_exam_answer = new CourseModuleExamAnswer();
            $course_module_exam_answer->course_module_exam_id = $course_module_exam->id;
            $course_module_exam_answer->course_module_question_id = $question->id;

            if(isset($answers[$question->id])) {
                $course_module_exam_answer->selected_option = $answers[$question->id];
                $course_module_exam_answer->is_correct = ($answers[$question->id] === $question->answer) ? 'Yes' : 'No';

                if($answers[$question->id] === $question->answer) {
                    $total_correct_answers++;
                }
            }
            else {
                $course_module_exam_answer->selected_option = null;
                $course_module_exam_answer->is_correct = 'No';
            }
            
            $course_module_exam_answer->save();
        }

        $marks = ($total_correct_answers / $total_questions) * 100;
        $result = ($marks >= 75) ? 'Pass' : 'Fail';

        $course_module_exam->total_correct_answers = $total_correct_answers;
        $course_module_exam->marks = $marks;
        $course_module_exam->result = $result;
        $course_module_exam->save();

        $mail_data = [
            'name' => $student->first_name . ' ' . $student->last_name,
            'type' => 'module',
            'total_questions' => $total_questions,
            'total_correct_answers' => $total_correct_answers,
            'marks' => $marks,
            'result' => $result
        ];
    
        Mail::to($student->email)->send(new ExamResultMail($mail_data));

        return redirect()->back()->with([
            'success' => 'Submission success',
            'course_module_exam_id' => $course_module_exam->id
        ]);
    }

    public function results(Course $course, CourseModule $course_module, CourseModuleExam $course_module_exam)
    {
        $questions = CourseModuleExamQuestion::where('course_id', $course->id)->where('module_id', $course_module->id)->where('status', '1')->get();
        $provided_answers = CourseModuleExamAnswer::where('course_module_exam_id', $course_module_exam->id)->get();

        $questions_answers = $questions->map(function ($question) use ($provided_answers) {
            $provided_answer = $provided_answers->firstWhere('course_module_question_id', $question->id);

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

        return view('frontend.student.courses.module-exam-result', [
            'course' => $course,
            'course_module' => $course_module,
            'course_module_exam' => $course_module_exam,
            'questions_answers' => $questions_answers
        ]);
    }

}