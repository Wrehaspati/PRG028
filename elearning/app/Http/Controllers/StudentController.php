<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = DB::table('students as a')
                    ->select('a.*' , 'c.grade_name', 'a.created_at', 'a.updated_at')
                    ->leftJoin('student_grades as b', 'a.id', '=', 'b.student_id')
                    ->leftJoin('grades as c', 'b.grade_id', '=', 'c.id')
                    ->orderBy('status', 'asc')
                    ->get();

        return view('management/students', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function verify(student $student)
    {
        $student->status = 'verified';
        $student->save();

        return redirect()->back()->with('msg', 'Berhasil untuk verifikasi siswa');
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
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        student::destroy($student->id);
        return back();
    }
}
