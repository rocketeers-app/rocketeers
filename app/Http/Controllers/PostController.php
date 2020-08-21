<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use Spatie\Sheets\Facades\Sheets;

class PostController extends Controller
{
    public function index()
    {
        $posts = Sheets::all();

        return view('posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }
}
