<?php

namespace App\Http\Controllers;

use App\Models\{
    User,
    Contect,
    Post,
    Category
};
use Illuminate\Http\Request;

class TestUser extends Controller
{
    // public function index(User $user){
    //     $user->with('contact')->first();
    //     dd($user->all());
    // }
    public function index(){
        // $user = User::with('contact')->first();
        // dd($user->toArray());

        // $user=User::with(['contact','post'])->find(1);
        $post=Post::with(['categories'])->find(1);

        dd($post->toArray());
    }
}
