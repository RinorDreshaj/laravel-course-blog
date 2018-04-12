<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Auth;

class CommentsController extends Controller
{
    public function store(Request $request, $id)
    {
//        $post = Post::where('id', $id)->first();
//
//        $post->comments()->create([
//            "text" => $request->text,
//            "user_id" => Auth::user()->id
//        ]);

        Comment::create(["text" => $request->text, "post_id" => $id, "user_id" => Auth::user()->id]);

        return redirect("/posts/$id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $comment_id)
    {
        $comment = Comment::where('id', $comment_id)->first();

        if($comment->user_id == Auth::user()->id)
        {
            $comment->delete();

            return redirect("posts/$id");
        }
        else
        {
            return redirect("Login");
        }
    }
}
