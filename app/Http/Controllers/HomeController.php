<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        // obtain following users
        dd(auth()->user()->following->pluck("id")->toArray());

        return view("home");
    }
}
