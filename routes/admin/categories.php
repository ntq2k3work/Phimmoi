<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/admin/categories',[CategoryController::class,'index'])->name('admin.categories')->middleware('auth');
Route::get('/admin/categories/create',[CategoryController::class,'create'])->name('admin.categories.create')->middleware('auth');
Route::post('/admin/categories/store',[CategoryController::class,'store'])->name('admin.categories.store')->middleware('auth');
Route::get('/admin/categories/{id}/edit',[CategoryController::class,'edit'])->name('admin.categories.edit')->middleware('auth');
Route::post('/admin/categories/{id}/update',[CategoryController::class,'update'])->name('admin.categories.update')->middleware('auth');
Route::delete('/admin/categories/{id}/destroy',[CategoryController::class,'destroy'])->name('admin.categories.destroy')->middleware('auth');

