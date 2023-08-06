<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\File as FileModel;
use Faker\Core\File as CoreFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = FileModel::all();
        return view('managements/files', ['files' => $files]);
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
        $checkDeadline = Assignment::find($request->assignment_id);

        AssignmentController::checkDeadline($checkDeadline->due_date, $request->assignment_id);

        $checkDeadline = Assignment::find($request->assignment_id);

        if($checkDeadline->status == 'closed' && $request->assign_by != 'teacher'):
            return redirect()->back()->with('error', 'Waktu pengajuan telah berakhir.');
        endif;

        $this->validate($request, [
                'filenames' => 'required',
                'filenames.*' => 'required'
        ]);

        $files = [];
        if($request->hasfile('filenames'))
        {
            date_default_timezone_set('Asia/Makassar');
            foreach($request->file('filenames') as $file)
            {
                
                if($request->assign_by == 'teacher'):
                    $uniqueName = $request->unique_subject_name.'-'.date("his").'_'.$request->assignment_id.'_'.$file->getClientOriginalName();
                else:
                    $uniqueName = $request->unique_id.'_'.date("his").'_'.$file->getClientOriginalName();
                endif;

                $custom_path = $request->unique_grade_id.'_'.$request->unique_subject_name.'_'.$request->unique_subject_id;

                // $random_name = time().rand(1,100).'.'.$file->extension();
                $name = $uniqueName;
                $file->storeAs($custom_path, $name, 'public');  
                $files[] = $name;  
            }
        }

        if(isset($request->type)):
            if($request->type == 'replace'):
                $deletedFiles = FileModel::where('assignment_id', $request->assignment_id)->where('user_id', Auth::user()->id)->get();
                foreach($deletedFiles as $file):
                    $this->destroy($file);
                endforeach;
            endif;
        endif;

        foreach($files as $file_data):
            $file = new FileModel;
            $file->filename = $file_data;
            $file->path = 'storage/'.$custom_path.'/';
            $file->assignment_id = $request->assignment_id;
            $file->assign_by = $request->assign_by;
            $file->user_id = Auth::user()->id;
            $file->save();
        endforeach;

        return back()->with('msg', 'Upload File');
    }

    /**
     * Display the specified resource.
     */
    public function show(FileModel $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FileModel $file)
    {
        //
    }

    /**
     * Update the grade of student
     */
    public function grade(Request $request)
    {
        $file = FileModel::find($request->file_id);
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
    public function destroy(FileModel $file)
    {
        $temp = FileModel::find($file->id);

        if(File::exists(public_path($temp->path.$temp->filename))){
            File::delete(public_path($temp->path.$temp->filename));
        }

        FileModel::destroy($file->id);
        return back()->with('msg', 'Hapus File (id:'.$file->id.')');
    }
}
