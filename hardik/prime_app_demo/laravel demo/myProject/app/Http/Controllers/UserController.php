<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request){
        if ($request->filled('search')) {
            $users = User::search($request->search)->paginate(5);
        } else {
            $users =User::paginate(5);
            
        }
        
        return view('user',compact('users'));
    } 
}
