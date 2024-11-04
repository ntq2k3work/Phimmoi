<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/admin/users',[UserController::class,'index'])->name('admin.users')->middleware('auth');
Route::get('admin/users/create',[UserController::class,'create'])->name('admin.users.create')->middleware('auth');
Route::post('admin/users/store',[UserController::class,'store'])->name('admin.users.store')->middleware('auth');
// Route::get('admin/users/{id}/edit',[UserController::class,'edit'])->name('admin.users.edit')->middleware('auth');
Route::post('admin/users/{id}/update',[UserController::class,'update'])->name('admin.users.update')->middleware('auth');
