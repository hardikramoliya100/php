<?php

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', [\App\Http\Controllers\TestUser::class,'index']);

// Route::get('/', function () {
//     // Mail::to('abc@gmail.com')->send(new \App\Mail\jobmail);
//     dispatch(new \App\Jobs\SendmailJob);
//     return view('welcome');
// });

Route::get('/users', function () {
    // return new UserCollection(User::all());
    $user = UserResource::collection(User::all());

    
    // print_r($user);
    // $user = json_encode($user);
    // $user=json_decode($user);
// echo "<pre>";
    // print_r($user);

    // foreach ($user[1] as $value) {
    //     echo "<pre>";
    //     print_r($value);
    // }


    return $user;
});

Route::get('/users/{id}', function ($id) {
    return new UserResource(User::findOrFail($id));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/group/{id}', [App\Http\Controllers\HomeController::class, 'group']);

Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
