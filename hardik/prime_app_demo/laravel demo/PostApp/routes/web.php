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

Route::view('/post','showallpost');
Route::get('/fatchallpost',[\App\Http\Controllers\PostController::class,'index']);
Route::get('post/list', [\App\Http\Controllers\PostController::class, 'getpost'])->name('post.list');
Route::view('/addpost','addnewpost');
Route::post('/savenewpost',[\App\Http\Controllers\PostController::class,'store']);

// Route::view('/editpost/{id}','editpost');
Route::get('/editpost/{id}',[\App\Http\Controllers\PostController::class,'edit']);
Route::post('/updatepost',[\App\Http\Controllers\PostController::class,'update']);
Route::get('/deletepost/{id?}',[\App\Http\Controllers\PostController::class,'destroy']);
