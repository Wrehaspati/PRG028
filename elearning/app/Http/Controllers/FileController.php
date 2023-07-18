<?php

namespace App\Http\Controllers;

use App\Models\file;
use Faker\Core\File as CoreFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::all();
        return view('management/files', ['files' => $files]);
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
        $this->validate($request, [
                'filenames' => 'required',
                'filenames.*' => 'required'
        ]);

        $files = [];
        if($request->hasfile('filenames'))
        {
            foreach($request->file('filenames') as $file)
            {
                
                if($request->assign_by == 'teacher'):
                    $uniqueName = $request->unique_subject_name.'-'.$request->assignment_id.'_'.$file->getClientOriginalName();
                else:
                    $uniqueName = $request->unique_id.'_'.$file->getClientOriginalName();
                endif;

                $custom_path = $request->unique_grade_id.'_'.$request->unique_subject_name;

                // $random_name = time().rand(1,100).'.'.$file->extension();
                $name = $uniqueName;
                $file->storeAs($custom_path, $name, 'public');  
                $files[] = $name;  
            }
        }

        foreach($files as $file_data):
            $file = new File;
            $file->filename = $file_data;
            $file->path = 'storage/'.$custom_path.'/';
            $file->assignment_id = $request->assignment_id;
            $file->assign_by = $request->assign_by;
            $file->user_id = Auth::user()->id;
            $file->save();
        endforeach;

        return back()->with('success', 'Data Your files has been successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(file $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(file $file)
    {
        //
    }

    /**
     * Update the grade of student
     */
    public function grade(Request $request)
    {
        $file = file::find($request->file_id);
        $file->grade = $request->grade;
        $file->save();

        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, file $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(file $file)
    {
        file::destroy($file->id);
        return back();
    }
}
