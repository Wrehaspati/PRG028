<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\StudentGrade;
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
        // When role is null and empty
        if(Auth::user()->role == null && Auth::user()->role == ''):
            $student_id = Student::where('user_id', Auth::user()->id)->first();
            if($student_id != null && $student_id->status != 'pending'):
                $student_grade = Student::find($student_id->id)->grade()->first();
                
                $subject = Subject::where('grade_id', $student_grade->id)->get();

                return view('dashboard', ['courses' => $subject, 'grade' => $student_grade]);
                // redirect to verify page
            else:
                return redirect()->route('user.verification');
            endif;
        
        // When role is equal to teacher
        elseif(Auth::user()->role->role == 'teacher'):
            $teacher_id = Teacher::where('user_id', Auth::user()->id)->first();
            if($teacher_id != null):
                $subject = Subject::where('teacher_id', $teacher_id->id)->leftjoin('grades', 'grade_id', '=', 'grades.id')->get();

                return view('dashboard', ['courses' => $subject, 'grade' => null]);
            else:
                abort(401);
            endif;

        // When role is equal to Admin
        elseif(Auth::user()->role->role == 'administrator'):
            return view('dashboard-admin');
        endif;

        abort(401);
    }

    public function verificationForm()
    {
        $check = Student::where('user_id', Auth::user()->id)->first();
        if($check):
            if($check->status != 'pending')
                return redirect('/dashboard');
            return view('user-verify', ['isWaiting' => true]);
        endif;
        $grades = Grade::all();
        return view('user-verify', ['grades' => $grades]);
    }

    public function teacherVerification()
    {
        return view('user-verify', ['isTeacher' => true]);
    }

    public function verificationRequest(Request $request)
    {
        if(isset($request->token)):
            $validation = Teacher::where('token', $request->token)->first();

            if($validation == True && $validation != null):
                $validation->user_id = Auth::user()->id;
                $validation->save();
                
                return redirect('/dashboard');
            endif;

            return redirect()->back()->with('msg', 'Proses verifikasi gagal! Hubungi Bagian Administrasi/BK');
        else:
            $validation = Student::find($request->id);

            if($validation == True && $validation != null)
                return redirect()->back()->with('msg', 'Akun dengan NIM ini telah terdaftar / sedang dalam proses validasi, Mohon hubungi guru/BK jika terjadi kendala');

            $student = new Student();
            $student->id = $request->id;
            $student->student_name = $request->name;
            $student->user_id = Auth::user()->id;
            $student->status = 'pending';
            $student->save();

            $student_grade = new StudentGrade();
            $student_grade->grade_id = $request->grade;
            $student_grade->student_id = $request->id;
            $student_grade->save();

            return redirect()->back()->with('msg', 'Akun berhasil didaftarkan dan dalam proses verifikasi, Mohon hubungi guru/bk jika terjadi kendala');

        endif;
    }
}
