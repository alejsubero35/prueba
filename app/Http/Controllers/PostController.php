<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function show($id)
    {
        
        $post = Post::findOrFail($id)->load('user');
        
        return view('posts.show')->withPost($post);
    }
}
