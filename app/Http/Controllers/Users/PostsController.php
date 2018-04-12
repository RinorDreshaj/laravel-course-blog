<?php

namespace App\Http\Controllers\Users;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', Auth::user()->id)->get();

        return view('user_posts.index', compact('posts'));
    }

    public function destroy($id)
    {
        $post = Post::where('id', $id)->first();

        if($post->user_id == Auth::user()->id)
        {
            $post->delete();

            return redirect("users/posts");
        }

        return redirect("login");
    }
}
