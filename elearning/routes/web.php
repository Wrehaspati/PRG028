<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Models\Assignment;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {


    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [DashboardController::class,'index'])->name('course.index');
        Route::get('/{grade}/subject/{subject}', [SubjectController::class, 'show'])->name('course.show');
    });

    Route::get('course/{grade}/subject/{subject}/{assignment_id}', [AssignmentController::class, 'show'])->name('course.assignment');

    Route::resources([
        'assignments' => AssignmentController::class,
        'subjects' => SubjectController::class,
        'teachers' => TeacherController::class,
        'grades' => GradeController::class,
        'students' => StudentController::class,
    ]);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/manage')->group(function () {
        Route::get('grades', [GradeController::class, 'index'])->name('management.kelas');

        Route::get('students', [StudentController::class, 'index'])->name('management.siswa');

        Route::get('teachers', [TeacherController::class, 'index'])->name('management.guru');

        Route::get('subjects', [SubjectController::class, 'index'])->name('management.matapembelajaran');

        Route::resource('file', FileController::class);
    });


});

//routes edit
Route::get('/edit-assignment' , function () {
    return view('edit-assignment');
});



require __DIR__.'/auth.php';