<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware("auth", except: ["show", "index"])
        ];
    }

    public function index(User $user, Request $request)
    {
        $posts = Post::where("user_id", $user->id)->paginate(8);

        return view("dashboard", [
            "user" => $user,
            "posts" => $posts
        ]);
    }

    public function create()
    {
        return view("posts.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|max:255",
            "description" => "required",
            "image" => "required"
        ]);

        Post::create([
            "title" => $request->title,
            "description" => $request->description,
            "image" => $request->image,
            "user_id" => auth()->user()->id
        ]);

        return redirect()->route("posts.index", auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {
        return view("posts.show", [
            "post" => $post,
            "user" => $user
        ]);
    }
}
