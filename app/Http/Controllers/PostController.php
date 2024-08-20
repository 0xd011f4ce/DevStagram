<?php

namespace App\Http\Controllers;

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
        dd($user);
        return view("dashboard");
    }
}
