<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function profile() 
    {
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)->paginate(9);
        
        return view('users.profile', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function show($username) 
    {
        $user = User::where('username', $username)->firstOrFail();
        $posts = Post::where('user_id', $user->id)->paginate(9);
        
        return view('users.show', [
            'posts' => $posts,
            'user' => $user,
        ]);
    }
}
