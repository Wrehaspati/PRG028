<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = DB::table('grades as a')
                    ->select('a.*', DB::raw('COUNT(b.student_id) as jumlah_siswa'))
                    ->leftjoin('student_grades as b', 'a.id', '=', 'b.grade_id')
                    ->groupBy('a.id', 'a.grade_name', 'a.created_at', 'a.updated_at')
                    ->get();

        return view('managements/grades', ['grades' => $grades]);
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
        $grade_check = Grade::find($request->id);
        if($grade_check != null)
            return redirect()->back()->with('msg', 'ID Terduplikasi, Mohon Masukan ID yang berbeda');
            

        $grade = new grade;
        $grade->id = $request->id;
        $grade->grade_name = $request->name;
        $grade->save();

        return redirect()->back()->with('msg', 'Berhasil untuk menambahkan Grade baru!');
    }

    /**
     * Display the specified resource.
     */
    public function show(grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(grade $grade)
    {
        return view('managements/edit-pages/edit-grades', ['grade' => $grade]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, grade $grade)
    {
        $grade->update(['id' => $request->id, 'grade_name' => $request->grade_name]);

        return redirect()->route('management.kelas')->with('msg', 'Berhasil mengedit id:'.$request->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(grade $grade)
    {
        Grade::destroy($grade->id);
        return back();
    }
}
