<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ojtController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\WeDoController;
use App\Http\Controllers\ProjectController;




Route::get('/login', [ProjectController::class, 'login']);
Route::get('/fetch_login', [ProjectController::class, 'fetch_login']);
Route::get('/logout', [ProjectController::class, 'logout']);

Route::get('cadmin', [ProjectController::class, 'cadmin']);
Route::post('regadmin', [ProjectController::class, 'regadmin']);



Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/', [ProjectController::class, 'home']);
    Route::get('apply', [ProjectController::class, 'applicant']);
    Route::get('getapplicant', [ProjectController::class, 'allApplicants']);
    Route::post('create', [ProjectController::class, 'store']);
    Route::get('create', [ProjectController::class, 'create']);
    Route::get('searchapplicant', [ProjectController::class, 'search']);
    Route::get('select', [ProjectController::class, 'getselected']);
    Route::post('/getloguser', [ProjectController::class, 'getloguser']);
    Route::get('/print', [ProjectController::class, 'print']);
    Route::get('/appDate', [ProjectController::class, 'sort']);
});





// Route::get('/show/{dar}', [ojtController::class, 'show']);

// Route::get('/WeDo', [WeDoController::class, 'home']);
// Route::get('/WeDoLogin',[WeDoController::class, 'login']);
// Route::get('/WeDoDashboard',[WeDoController::class, 'dashboard']);
// Route::get('/WeDoSignup',[WeDoController::class, 'signup']);

// Route::get('/add_student', [StudentController::class, 'create']);
// Route::post('/add_student', [StudentController::class, 'store']);
// Route::get('/get_allStudent', [StudentController::class, 'get_allstudent']);
// Route::get('/delete_student', [StudentController::class, 'delete_student']);
// Route::post('/update_student', [StudentController::class, 'update_student']);
// Route::get('/search_student', [StudentController::class, 'search_student']);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
