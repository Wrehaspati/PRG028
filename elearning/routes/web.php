<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
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


Route::get('/management/kelas', function () {
    return view('ManagementKelas');
})->name('management.kelas');

Route::get('/management/siswa', function () {
    return view('ManagementSiswa');
})->name('management.siswa');

Route::get('/management/guru', function () {
    return view('ManagementGuru');
})->name('management.guru');

Route::get('/management/mata/pembelajaran', function () {
    return view('ManagementMataPembelajaran');
})->name('management.matapembelajaran');

Route::get('/file/tersimpan', function () {
    return view('FileTersimpan');
})->name('file.tersimpan');


Route::middleware('auth')->group(function () {
    
    Route::controller(SubjectController::class)->group(function () {
        Route::prefix('/course')->group(function () {
            Route::get('/', 'index')->name('course.index');
            Route::get('/{grade}/subject/{subject}', 'show')->name('course.show');
        });
    });

    Route::get('course/{grade}/subject/{subject}/{assignment_id}', [AssignmentController::class, 'show'])->name('course.assignment');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';