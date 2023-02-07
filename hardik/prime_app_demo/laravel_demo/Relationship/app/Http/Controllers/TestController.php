<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contect;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    function index(){
        // $user = User::with('contect')->first();
        // dd($user->toArray());
        
        // $contect = Contect::with('user')->first();
        // dd($contect->toArray());
        
        // $user=User::with('post')->find(1);
        // dd($user->post);
        // dd($user->toArray());
        
        $category = Category::all();
        // dd($category);
        $post=Post::with('categoies')->find(1);
        $post->categoies()->sync([1,2]);
        
        dd($post->toArray());

    }
}
