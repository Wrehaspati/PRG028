<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    
    /**
     * Slug name conversion
     */
    private function urlConvertion($name, $grade)
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

        $id = Subject::where('subject_name', $result)->where('grade_id', $grade)->first();

        return $id;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = DB::table('subjects as a')
                    ->select('a.*', 'b.teacher_name')
                    ->leftJoin('teachers as b', 'a.teacher_id', '=', 'b.id')
                    ->get();
        return view('management/subjects', ['subjects' => $subjects]);
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

        $subject_id = $this->urlConvertion($subject, $grade);

        $subject = Subject::find($subject_id->id);

        $assignments = Subject::find($subject_id->id)->assignments;

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
        Subject::destroy($subject->id);
        return back();
    }
}
