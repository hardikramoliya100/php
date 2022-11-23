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
    return view('welcome');      
});
Route::get('/courses', [App\Http\Controllers\CourcesController::class, 'index']);
Route::post('/savecourse', [App\Http\Controllers\CourcesController::class, 'store']);
Route::get('/deletecourse/{courseid?}', [App\Http\Controllers\CourcesController::class, 'destroy']);
Route::post('/editcourse/{courseid?}', [App\Http\Controllers\CourcesController::class, 'update']);
Route::get('/students', [App\Http\Controllers\StudentsController::class, 'index']);
Route::post('/savestudent', [App\Http\Controllers\StudentsController::class, 'store']);
Route::get('/deletestudent/{studentid?}', [App\Http\Controllers\StudentsController::class, 'destroy']);
Route::post('/editstudent/{studentid?}', [App\Http\Controllers\StudentsController::class, 'update']);
