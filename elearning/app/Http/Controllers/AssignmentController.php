<?php

namespace App\Http\Controllers;

use App\Models\assignment;
use App\Models\File;
use App\Models\Subject;
use App\View\Components\AssignmentCard;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AssignmentController extends Controller
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
        //
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
        $assignment = new Assignment;
        $assignment->assignment_title = $request->title;
        $assignment->subject_id = $request->subject;
        $assignment->description = $request->description;
        $assignment->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($grade, $subject, $assigment_id)
    {
        $subject_id = $this->urlConvertion($subject, $grade);

        $subject = Subject::find($subject_id->id);

        $assignments = Assignment::find($assigment_id);

        $files = DB::table('files as a')
            ->select('a.*', 'b.student_name', 'b.id as student_id')
            ->leftJoin('students as b', 'a.user_id', '=', 'b.user_id')
            ->where('a.assign_by', 'student')
            ->where('a.assignment_id', $assigment_id)
            ->get();

        return view('assignment-page', ['subject' => $subject, 'assignment' => $assignments, 'files' => $files]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(assignment $assignment)
    {
        assignment::destroy($assignment->id);
        return redirect('dashboard/');
    }
}
