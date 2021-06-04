<?php

namespace App\Http\Controllers\Auth;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $posts = Post::with(['user', 'likes']);
        return view('posts.index',[
            'posts'     => Post::paginate(15)
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

    public function delete(Post $posts)
    {
        dd($posts);
    }   
}
