<?php

namespace App\Http\Controllers\Auth;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('posts.index',[
            'posts'     => $posts
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body'  =>  'required'
        ]);

        $request->user()->posts()->create($request->only('body'));

        return back();
    }
}
