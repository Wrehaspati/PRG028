<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public static function isTeacher($subject_id)
    {
        if(Auth::user()->role):
            if(Auth::user()->role->role == 'teacher'):
                $teacher = Teacher::where('user_id', Auth::user()->id)->first();
                $subject = Subject::find($subject_id)->first();
    
                if(!$teacher || $teacher->id != $subject->teacher_id)
                    abort(401);
            endif;
        endif;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = DB::table('teachers as a')
                    ->select('a.*', 'b.role')
                    ->leftJoin('roles as b', 'a.user_id', '=', 'b.user_id')
                    ->get();

        return view('managements/teachers', ['teachers' => $teachers]);
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
        $teacher = new teacher;
        $teacher->id = $request->id;
        $teacher->teacher_name = $request->name;
        $teacher->token = $request->token;
        $teacher->save();

        return redirect()->back()->with('msg', 'Berhasil untuk menambahkan Grade baru!');
    }

    /**
     * Display the specified resource.
     */
    public function show(teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(teacher $teacher)
    {
        $users = User::all();
        return view('managements/edit-pages/edit-teachers', ['teacher' => $teacher, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, teacher $teacher)
    {
        $teacher->update(['id' => $request->id, 'teacher_name' => $request->teacher_name, 'user_id' => $request->user_id, 'token' => $request->token]);

        return redirect()->route('management.guru')->with('msg', 'Berhasil mengedit id:'.$request->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(teacher $teacher)
    {
        Role::where('user_id',$teacher->user_id)->delete();
        teacher::destroy($teacher->id);

        return back()->with('msg', 'Berhasil menghapus id:'.$teacher->id);
    }
}
