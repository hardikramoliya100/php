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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/test', 'mypage');
Route::get('/allproduct', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('/addnewproduct', [App\Http\Controllers\ProductController::class, 'create']);
Route::post('/storeproduct', [App\Http\Controllers\ProductController::class, 'store']);
Route::get('/deleteproduct/{prodid?}', [App\Http\Controllers\ProductController::class, 'destroy']);
Route::get('/editproduct/{prodid?}', [App\Http\Controllers\ProductController::class, 'edit']);
Route::post('/saveeditedproduct/{prodid?}', [App\Http\Controllers\ProductController::class, 'update']);
Route::get('generatepdf', [App\Http\Controllers\ProductController::class, 'generatePDF']);

// Route::get('/test', function(){
    // echo "home";
    // });
