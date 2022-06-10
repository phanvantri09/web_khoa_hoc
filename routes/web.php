<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\CateController;
use App\Http\Controllers\CheckUserControlller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are lhoaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//home
Auth::routes();  
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');
Route::get('/user/{id}', [CheckUserControlller::class, 'showprofile'])->name('user');
Route::get('/user/{id}', [CheckUserControlller::class, 'showprofile'])->name('user');
Route::post('/edit', [CheckUserControlller::class, 'editprofile'])->name('editprofile');

//backend
Route::get('admin/home', [adminController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
///Category
Route::resource('/Category', CateController::class);
Route::resource('/Course', CourseController::class);
Route::resource('/CheckUser', CheckUserControlller::class);
