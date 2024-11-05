<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/admin/categories',[CategoryController::class,'index'])->name('admin.categories')->middleware('auth');

