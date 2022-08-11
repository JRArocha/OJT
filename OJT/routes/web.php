<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ojtController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\WeDoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ojtController::class, 'list']);
Route::get('/show/{dar}', [ojtController::class, 'show']);

Route::get('/WeDo', [WeDoController::class, 'home']);





Route::get('/add_student', [StudentController::class, 'create']);
Route::post('/add_student', [StudentController::class, 'store']);
Route::get('/get_allStudent', [StudentController::class, 'get_allstudent']);
Route::get('/delete_student', [StudentController::class, 'delete_student']);
Route::post('/update_student', [StudentController::class, 'update_student']);
Route::get('/search_student', [StudentController::class, 'search_student']);
