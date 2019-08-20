<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::published()->withCount('comments')->get();

        return view('posts.index')->with('posts', $posts);
    }

    public function show(Post $post)
    {
        if (! $post->isPublished() && (auth()->guest() || ! auth()->user()->isAdmin())) {
            abort(404);
        }

        return view('posts.show')->with('currentPost', $post);
    }
}
