<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changepassword'])->name('profile.change-password');
    Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::get('/blank-page', [App\Http\Controllers\HomeController::class, 'blank'])->name('blank');


    Route::get('/batch', [App\Http\Controllers\BatchController::class, 'index'])->name('batch.index');
    Route::get('/batch/create', [App\Http\Controllers\BatchController::class, 'create'])->name('batch.create');
    Route::post('/batch/store', [App\Http\Controllers\BatchController::class, 'store'])->name('batch.store');
    Route::put('/batch/edit/{id}', [App\Http\Controllers\BatchController::class, 'edit'])->name('batch.edit');
    Route::put('/batch/update/{id}', [App\Http\Controllers\BatchController::class, 'update'])->name('batch.update');
    Route::delete('/batch/delete/{id}', [App\Http\Controllers\BatchController::class, 'destroy'])->name('batch.delete');

    Route::get('/mahasiswa', [App\Http\Controllers\MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/mahasiswa/create', [App\Http\Controllers\MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/mahasiswa/store', [App\Http\Controllers\MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/mahasiswa/edit/{id}', [App\Http\Controllers\MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/mahasiswa/update/{id}', [App\Http\Controllers\MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/mahasiswa/delete/{id}', [App\Http\Controllers\MahasiswaController::class, 'destroy'])->name('mahasiswa.delete');
    Route::get('/verifikasi', [App\Http\Controllers\MahasiswaController::class, 'verifikasi'])->name('mahasiswa.verifikasi');


    Route::get('/prodi', [App\Http\Controllers\ProdiController::class, 'index'])->name('prodi.index');
    Route::get('/prodi/create', [App\Http\Controllers\ProdiController::class, 'create'])->name('prodi.create');
    Route::post('/prodi/store', [App\Http\Controllers\ProdiController::class, 'store'])->name('prodi.store');
    Route::get('/prodi/edit/{id}', [App\Http\Controllers\ProdiController::class, 'edit'])->name('prodi.edit');
    Route::put('/prodi/update/{id}', [App\Http\Controllers\ProdiController::class, 'update'])->name('prodi.update');
    Route::delete('/prodi/delete/{id}', [App\Http\Controllers\ProdiController::class, 'destroy'])->name('prodi.delete');

    Route::get('/pt', [App\Http\Controllers\PtController::class, 'index'])->name('pt.index');
    Route::get('/pt/create', [App\Http\Controllers\PtController::class, 'create'])->name('pt.create');
    Route::post('/pt/store', [App\Http\Controllers\PtController::class, 'store'])->name('pt.store');
    Route::get('/pt/edit/{id}', [App\Http\Controllers\PtController::class, 'edit'])->name('pt.edit');
    Route::put('/pt/update/{id}', [App\Http\Controllers\PtController::class, 'update'])->name('pt.update');
    Route::delete('/pt/delete/{id}', [App\Http\Controllers\PtController::class, 'destroy'])->name('pt.delete');
});
