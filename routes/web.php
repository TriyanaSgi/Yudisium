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
    Route::get('/datamhs/data_mhs', [App\Http\Controllers\HomeController::class, 'data_mhs'])->name('data_mhs');
    Route::get('/datamhs/data_mhs_cr', [App\Http\Controllers\HomeController::class, 'data_mhs_cr'])->name('data_mhs_cr');


    Route::get('/datamhs/data_prodi', [App\Http\Controllers\HomeController::class, 'data_prodi'])->name('data_prodi');
    Route::get('/datamhs/prodi_cr', [App\Http\Controllers\HomeController::class, 'prodi_cr'])->name('prodi_cr');


    Route::get('/datamhs/data_pt', [App\Http\Controllers\HomeController::class, 'data_pt'])->name('data_pt');
    Route::get('/datamhs/pt_cr', [App\Http\Controllers\HomeController::class, 'pt_cr'])->name('pt_cr');



    Route::get('/batch', [App\Http\Controllers\BatchController::class, 'index'])->name('batch.index');
    Route::get('/batch/create', [App\Http\Controllers\BatchController::class, 'create'])->name('batch.create');
    Route::post('/batch/store', [App\Http\Controllers\BatchController::class, 'store'])->name('batch.store');
    Route::get('/batch/edit/{id}', [App\Http\Controllers\BatchController::class, 'edit'])->name('batch.edit');
    Route::put('/batch/update/{id}', [App\Http\Controllers\BatchController::class, 'update'])->name('batch.update');
    Route::delete('/batch/delete/{id}', [App\Http\Controllers\BatchController::class, 'destroy'])->name('batch.delete');


});
