<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ojtController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\WeDoController;

Auth::routes();

Route::get('/', [WeDoController::class, 'login']);
Route::get('/show/{dar}', [ojtController::class, 'show']);

Route::get('/WeDo', [WeDoController::class, 'home']);
Route::get('/WeDoLogin',[WeDoController::class, 'login']);
Route::get('/WeDoDashboard',[WeDoController::class, 'dashboard']);
Route::get('/WeDoSignup',[WeDoController::class, 'signup']);

Route::get('/add_student', [StudentController::class, 'create']);
Route::post('/add_student', [StudentController::class, 'store']);
Route::get('/get_allStudent', [StudentController::class, 'get_allstudent']);
Route::get('/delete_student', [StudentController::class, 'delete_student']);
Route::post('/update_student', [StudentController::class, 'update_student']);
Route::get('/search_student', [StudentController::class, 'search_student']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
