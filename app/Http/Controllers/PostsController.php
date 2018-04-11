<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        $previous_id = Post::where('id', '<', $post->id)->max('id');
        $previous = Post::where('id', '=' , $previous_id)->first();

        $next_id = Post::where('id', '>', $post->id)->min('id');
        $next = Post::where('id', $next_id)->first();

        return view('posts.show', compact('post', 'previous', 'next' ,'next_id'));
    }
}
