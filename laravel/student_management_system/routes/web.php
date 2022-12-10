<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('courses');      
    // return view('welcome');      
});
Route::view('/courses','ShowAllCourses');
Route::get('/showallcourses', [App\Http\Controllers\CourcesController::class, 'showallcourse']);
Route::any('/savecourse', [App\Http\Controllers\CourcesController::class, 'store']);
Route::post('/editcourse', [App\Http\Controllers\CourcesController::class, 'edit']);
Route::post('/updatedata/{courseid}', [App\Http\Controllers\CourcesController::class, 'update']);
Route::get('/deletecourse/{courseid}', [App\Http\Controllers\CourcesController::class, 'destroy']);

Route::get('/students', [App\Http\Controllers\StudentsController::class, 'index']);
Route::post('/savestudent', [App\Http\Controllers\StudentsController::class, 'store']);
Route::post('/editstudent/{studentid?}', [App\Http\Controllers\StudentsController::class, 'update']);
Route::get('/deletestudent/{studentid?}', [App\Http\Controllers\StudentsController::class, 'destroy']);

Route::get('/showmarks', [App\Http\Controllers\MarkController::class, 'index']);
Route::get('/showallmark', [App\Http\Controllers\MarkController::class, 'showallmark']);
Route::post('/savemark', [App\Http\Controllers\MarkController::class, 'store']);
Route::get('/deletemark/{markid?}', [App\Http\Controllers\MarkController::class, 'destroy']);
Route::post('/editmark/{markid?}', [App\Http\Controllers\MarkController::class, 'update']);
