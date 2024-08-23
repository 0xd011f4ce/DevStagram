<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignupController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::get("/signup", [SignupController::class, "index"])->name("signup");
Route::post("/signup", [SignupController::class, "store"]);

Route::get("/login", [LoginController::class, "index"])->name("login");
Route::post("/login", [LoginController::class, "store"]);
Route::post("/logout", [LogoutController::class, "store"])->name("logout");

Route::get("/{user:username}", [PostController::class, "index"])->name("posts.index");
Route::get("/posts/create", [PostController::class, "create"])->name("posts.create");
Route::post("/posts", [PostController::class, "store"])->name("posts.store");
Route::get("/{user:username}/posts/{post}", [PostController::class, "show"])->name("posts.show");
Route::delete("/posts/{post}", [PostController::class, "destroy"])->name("posts.destroy");

Route::post("/{user:username}/posts/{post}", [CommentController::class, "store"])->name("comment.store");

Route::post("/images", [ImageController::class, "store"])->name("images.store");

// likes
Route::post("/posts/{post}/likes", [LikeController::class, "store"])->name("posts.likes.store");
Route::delete("/posts/{post}/likes", [LikeController::class, "destroy"])->name("posts.likes.destroy");

// profile
Route::get("/{user:username}/edit-profile", [ProfileController::class, "index"])->name("profile.index");
Route::post("/{user:username}/edit-profile", [ProfileController::class, "store"])->name("profile.store");
