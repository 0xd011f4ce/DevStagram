<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        // obtain following users
        $ids = auth()->user()->following->pluck("id")->toArray();
        $posts = Post::whereIn("user_id", $ids)->latest()->paginate(24);

        return view("home", [
            "posts" => $posts
        ]);
    }
}
