<?php

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


Route::get('/dashboard/matematika', function () {
    return view('dashboardMatematika');
})->name('dashboard.matematika');

Route::get('/dashboard/file/matematika', function () {
    return view('dashboardFileMatematika');
})->name('dashboard.filematematika');


Route::middleware('auth')->group(function () {
    
    Route::controller(SubjectController::class)->group(function () {
        Route::prefix('/course')->group(function () {
            Route::get('/', 'index')->name('course.index');
            Route::get('/{grade}/subject/{subject}', 'show')->name('course.show');
        });
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';