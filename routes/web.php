<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SignupController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::get("/signup", [SignupController::class, "index"])->name("signup");
Route::post("/signup", [SignupController::class, "store"]);

Route::get("/login", [LoginController::class, "index"])->name("login");

Route::get("/wall", [PostController::class, "index"])->name("posts.index");
