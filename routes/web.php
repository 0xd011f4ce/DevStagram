<?php

use App\Http\Controllers\SignupController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::get("/signup", [SignupController::class, "index"])->name("signup");
Route::post("/signup", [SignupController::class, "store"]);
