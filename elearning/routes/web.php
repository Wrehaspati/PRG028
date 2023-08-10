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
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/admin', function () {
        return view('login-admin');
    });

Route::middleware('auth')->group(function () {

    // Routes for verification
    Route::get('verification', [DashboardController::class, 'verificationForm'])->name('user.verification');
    Route::get('verification/teacher', [DashboardController::class, 'teacherVerification'])->name('teacher.verification');
    Route::post('verification/request', [DashboardController::class, 'verificationRequest'])->name('verification.request');
    Route::put('verification/verify/{student}', [StudentController::class, 'verify'])->name('verify.request');

    // Dashboard Routes
    Route::get('/dashboard', [DashboardController::class,'index'])->name('course.index');

    // Assignments Routes 
    Route::get('course/{grade}/subject/{subject}/{assignment_id}', [AssignmentController::class, 'show'])->name('assignment.show');
    Route::get('course/{grade}/subject/{subject}', [SubjectController::class, 'show'])->name('course.show');
    Route::put('assignments/update/{assignment}', [AssignmentController::class, 'update'])->name('assignment.update');
    Route::post('course/{assignment_id}', [AssignmentController::class, 'close'])->name('assignment.close');
    Route::resource('assignment', AssignmentController::class)->only([
        'store', 'destroy'
    ]);

    // Files Routes
    Route::resource('files', FileController::class);

    // Route for input grade of the assignments
    Route::post('file/grade', [FileController::class, 'grade'])->name('file.grade');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Middleware for admin, only can be accessed by admins
    Route::middleware('admin')->group(function () {
        Route::prefix('/manage')->group(function () {
            Route::get('grades', [GradeController::class, 'index'])->name('management.kelas');
            Route::get('students', [StudentController::class, 'index'])->name('management.siswa');
            Route::get('teachers', [TeacherController::class, 'index'])->name('management.guru');
            Route::get('subjects', [SubjectController::class, 'index'])->name('management.matapembelajaran');
        });
        Route::prefix('/request')->group(function () {

            // Subjects Routes
            Route::resource('subject', SubjectController::class)->only([
                'store', 'destroy', 'edit', 'update'
            ]);

            // Teachers Routes
            Route::resource('teacher', TeacherController::class)->only([
                'store', 'destroy', 'edit', 'update'
            ]);

            // Grades Routes
            Route::resource('grade', GradeController::class)->only([
                'store', 'destroy', 'edit', 'update'
            ]);

            // Students Routes
            Route::resource('student', StudentController::class)->only([
                'destroy', 'edit', 'update'
            ]);
        });
    });

    // Middleware for teacher, only can be accessed by teachers
    Route::middleware('teacher')->group(function () {
        Route::get('course/{grade}/subject/{subject}/{assignment_id}/edit', [AssignmentController::class, 'edit'])->name('assignment.edit');
    });

});

Route::get('/linkstorage', function () {
    $exitCode = Artisan::call('storage:link', [] );
    echo $exitCode; // 0 exit code for no errors.
});

require __DIR__.'/auth.php';