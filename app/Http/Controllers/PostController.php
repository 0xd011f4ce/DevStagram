<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return ["auth"];
    }

    public function index(User $user, Request $request)
    {
        return view("dashboard", [
            "user" => $user
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
}
