<?php

use App\Http\Controllers\Admin\FilmController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/admin/films',[FilmController::class,'index'])->name('admin.films')->middleware('auth');
Route::get('/admin/films/create',[FilmController::class,'create'])->name('admin.films.create')->middleware('auth');
Route::post('/admin/films/store',[FilmController::class,'store'])->name('admin.films.store')->middleware('auth');


