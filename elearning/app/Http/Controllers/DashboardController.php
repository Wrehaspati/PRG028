<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role == null && Auth::user()->role == ''):
            $student_id = Student::where('user_id', Auth::user()->id)->first();
            if($student_id != null):
                $student_grade = Student::find($student_id->id)->grade()->first();
                
                $subject = Subject::where('grade_id', $student_grade->id)->get();

                return view('dashboard', ['courses' => $subject, 'grade' => $student_grade]);
            else:
                abort(401);
            endif;
        elseif(Auth::user()->role->role == 'teacher'):
            $teacher_id = Teacher::where('user_id', Auth::user()->id)->first();
            if($teacher_id != null):
                $subject = Subject::where('teacher_id', $teacher_id->id)->leftjoin('grades', 'grade_id', '=', 'grades.id')->get();

                return view('dashboard', ['courses' => $subject, 'grade' => null]);
            else:
                abort(401);
            endif;
        elseif(Auth::user()->role->role == 'administrator'):
            return view('dashboard-admin');
        endif;

        abort(401);
    }
}
