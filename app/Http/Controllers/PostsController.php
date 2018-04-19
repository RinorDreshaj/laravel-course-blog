<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::where('id',$id)->with('comments')->first();

//        dd($post->toArray());

        $previous_id = Post::where('id', '<', $post->id)->max('id');
        $previous = Post::where('id', '=' , $previous_id)->first();

        $next_id = Post::where('id', '>', $post->id)->min('id');
        $next = Post::where('id', $next_id)->first();

        return view('posts.show', compact('post', 'previous', 'next' ,'next_id'));
    }

    public function category(Request $request, $id)
    {
        $posts = Post::where('category_id' , $id)->paginate();

        return view('posts.index' , compact('posts'));
    }
}
