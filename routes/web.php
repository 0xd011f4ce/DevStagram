<?php

use App\Http\Controllers\SignupController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::get("/signup", [SignupController::class, "index"]);
Route::post("/signup", [SignupController::class, "store"]);
