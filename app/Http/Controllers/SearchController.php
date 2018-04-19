<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search_parametri = $request->name ?? "";

        $posts = Post::where('title', 'like', "%{$search_parametri}%")->paginate(10);

        return view('search.index', compact('posts'));
    }

}
