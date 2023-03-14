<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth; 
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('post/list', [PostController::class, 'getpost'])->name('post.list');
Route::get('/deletepost/{id?}',[PostController::class,'destroy']);
// Route::get('/post/{id}',[PostController::class,'show']);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('posts', PostController::class);
});



// Route::prefix('posts')->group(function() {
//     Route::match(['get', 'head'], '/', 'PostsController@index')->name('post.index');
//     // Route::match(['get', 'head'], '/show', 'departmentcontroller@show')->name('department.show');

// });

// Route::prefix('users')->group(function() {
//     Route::match(['get', 'head'], '/', 'UserController@index')->name('user.index');
//     // Route::match(['get', 'head'], '/show', 'departmentcontroller@show')->name('department.show');

// });