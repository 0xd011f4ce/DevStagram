<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index()
    {
        return view("auth.signup");
    }

    public function store(Request $request)
    {
        // modify request
        $request->request->add([
            "username" => Str::slug($request->username),
        ]);

        // Validate the request...
        $request->validate([
            "name" => "required|max:16",
            "username" => "required|unique:users|min:3|max:16",
            "email" => "required|unique:users|email|max:64",
            "password" => "required|min:8|max:64|confirmed",
        ]);

        User::create([
            "name" => $request->name,
            "username" => Str::slug($request->username),
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
    }
}
