<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function index()
    {
        return view("auth.signup");
    }

    public function store()
    {
        dd("Post...");
    }
}
