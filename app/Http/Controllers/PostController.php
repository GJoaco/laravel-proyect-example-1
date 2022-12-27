<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\SavePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function Index()
    {
        $posts = Post::get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function Show(Post $post)
    {
        return view('posts.show', ['post' => $post]);    
    }

    public function Create()
    {
        $post = new Post;
        return view('posts.create', ['post' => $post]);   
    }

    public function Store(SavePostRequest $request)
    {
        Post::create($request->validated());
        return to_route('posts.index')->with('status', 'Post created!');  
    }

    public function Edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);    
    }

    public function Update(SavePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return to_route('posts.index')->with('status', 'Post updated!');  ;    
    }

    public function Destroy(Post $post)
    {
        $post->delete();
        return to_route('posts.index')->with('status', 'Post deleted!');  ;    
    }
}
