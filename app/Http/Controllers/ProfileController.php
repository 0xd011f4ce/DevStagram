<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class ProfileController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return ["auth"];
    }

    public function index()
    {
        return view("profile.index");
    }

    public function store(Request $request)
    {
        // modify request
        $request->request->add([
            "username" => Str::slug($request->username),
        ]);

        // Validate the request...
        $request->validate([
            "username" => ["required", "unique:users,username," . auth()->user()->id, "min:3", "max:16", "not_in:edit-profile"],
        ]);
    }
}
