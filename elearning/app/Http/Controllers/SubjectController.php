<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class SubjectController extends Controller
{
    /**
     * Slug name conversion
     */
    private function urlConvertion($name)
    {
        $result = null;
        $unslug_name = str_replace('-', ' ', $name);
        $raws = Subject::all();

        foreach($raws as $raw):
            $slug_raw = Str::slug($raw->subject_name);
            $unslug_raw = str_replace('-', ' ', $slug_raw);
            if($unslug_raw === $unslug_name):
                $result = $raw->subject_name;
                break;
            endif;
        endforeach;

        if($result == null):
            abort(401);
        endif;

        $id = Subject::where('subject_name', $result)->first();

        return $id;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role == null || Auth::user()->role == ''):
            $student_id = Student::where('user_id', Auth::user()->id)->first();
            if($student_id != null):
                $student_grade = Student::find($student_id->id)->grade()->first();
                
                $subject = Subject::where('grade_id', $student_grade->id)->get();

                return view('dashboard', ['courses' => $subject, 'grade' => $student_grade]);
            else:
                abort(400);
            endif;
        elseif(Auth::user()->role->role == 'teacher'):
            $teacher_id = Teacher::where('user_id', Auth::user()->id)->first();
            if($teacher_id != null):
                $subject = Subject::where('teacher_id', $teacher_id->id)->leftjoin('grades', 'grade_id', '=', 'grades.id')->get();

                return view('dashboard', ['courses' => $subject, 'grade' => null]);
            else:
                abort(400);
            endif;
        elseif(Auth::user()->role->role == 'administrator'):
            return view('dashboard-admin');
        endif;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($grade, $subject)
    {
        $assignments = null;

        $subject_id = $this->urlConvertion($subject);

        $subject = Subject::find($subject_id->id);

        $assignments = Subject::find($subject_id->id)->assignments;

        Log::debug($assignments);

        return view('subject-page', ['subject' => $subject, 'assignments' => $assignments ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
