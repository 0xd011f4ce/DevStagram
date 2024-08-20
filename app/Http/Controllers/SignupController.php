<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function index()
    {
        return view("auth.signup");
    }

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            "name" => "required|max:16",
            "username" => "required|unique:users|min:3|max:16",
            "email" => "required|unique:users|email|max:64",
            "password" => "required|min:8|max:64|confirmed",
        ]);
    }
}
