<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(User $user, Post $post, Request $request)
    {
        // validate
        $request->validate([
            "comment" => "required|max:255"
        ]);

        // store
        Comment::create([
            "user_id" => auth()->user()->id,
            "post_id" => $post->id,
            "comment" => $request->comment
        ]);

        return back()->with('message', 'Comment added successfully');
    }
}
