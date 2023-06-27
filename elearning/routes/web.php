<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard/fisika', function () {
    return view('dashboardFisika');
})->name('dashboard.fisika');

Route::get('/dashboard/senibudaya', function () {
    return view('dashboardSenibudaya');
})->name('dashboard.senibudaya');

Route::get('/dashboard/kimia', function () {
    return view('dashboardKimia');
})->name('dashboard.kimia');

Route::get('/dashboard/kewirausahaan', function () {
    return view('dashboardKewirausahaan');
})->name('dashboard.kewirausahaan');

Route::get('/dashboard/PPKN', function () {
    return view('dashboardPPKN');
})->name('dashboard.PPKN');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/file/matematika', function () {
    return view('dashboardFileMatematika');
})->name('dashboard.filematematika');

Route::get('/dashboard/file/fisika', function () {
    return view('dashboardFileFisika');
})->name('dashboard.filefisika');

Route::get('/dashboard/file/senibudaya', function () {
    return view('dashboardFileSenibudaya');
})->name('dashboard.filesenibudaya');

Route::get('/dashboard/file/kimia', function () {
    return view('dashboardFileKimia');
})->name('dashboard.filekimia');

Route::get('/dashboard/file/kewirausahaan', function () {
    return view('dashboardFileKewirausahaan');
})->name('dashboard.filekewirausahaan');

Route::get('/dashboard/file/ppkn', function () {
    return view('dashboardFilePPKN');
})->name('dashboard.fileppkn');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';