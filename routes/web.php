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
    Route::get('/datamhs/data_mhs/data_mhs_cr', [App\Http\Controllers\HomeController::class, 'data_mhs'])->name('data_mhs');
    Route::get('/datamhs/data_mhs', [App\Http\Controllers\HomeController::class, 'data_mhs_cr'])->name('data_mhs_cr');
    Route::get('/datamhs/data_prodi', [App\Http\Controllers\HomeController::class, 'data_prodi'])->name('data_prodi');
    Route::get('/datamhs/data_pt', [App\Http\Controllers\HomeController::class, 'data_pt'])->name('data_pt');
    Route::get('/databatchyudisium/data_batch_yudisium', [App\Http\Controllers\HomeController::class, 'data_batch_yudisium'])->name('data_batch_yudisium');
});
