<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;


class PostController extends Controller
{
    public function index() {
        return view('posts', [
            'posts' => Post::latest('created_at')->with('category', 'author')->filter(request(['search']))->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post) {
        return view('post', [
            'post' => $post
        ]);
    }
}
