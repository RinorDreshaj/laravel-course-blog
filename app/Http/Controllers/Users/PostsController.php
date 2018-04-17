<?php

namespace App\Http\Controllers\Users;

use App\Category;
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

    public function store(Request $request)
    {
        $media_path = Post::fileUpload($request);

        $postimi = array_merge(
            [
                "user_id" => Auth::user()->id,
                "media" => $media_path ?? ""
            ],
            $request->only('title', 'description', 'category_id')
        );

        Post::create($postimi);

        return redirect('users/posts');
    }

    public function create()
    {
        return view('user_posts.create');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('user_posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();

        $media_path = Post::fileUpload($request);

        $post->update([
            "category_id" => $request->category_id ?? "",
            "description" => $request->description ?? "",
            "title" => $request->title ?? "",
            "media" => $media_path ?? $post->media ?? null
        ]);

        return redirect()->back();
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
