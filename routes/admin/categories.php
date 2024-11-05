<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/admin/categories',[CategoryController::class,'index'])->name('admin.categories')->middleware('auth');
Route::get('/admin/categories/create',[CategoryController::class,'create'])->name('admin.categories.create')->middleware('auth');
Route::post('/admin/categories/store',[CategoryController::class,'store'])->name('admin.categories.store')->middleware('auth');

