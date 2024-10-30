<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('pages.index');
});

Auth::routes();

// Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

// Route::get('/admin/users',[UserController::class,'index'])->name('admin.users')->middleware('auth');
