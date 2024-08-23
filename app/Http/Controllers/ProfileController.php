<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
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

        if ($request->pfp) {
            $image = $request->file("pfp");
            $nameImage = Str::uuid() . "." . $image->extension();

            $imageServer = Image::read($image);
            $imageServer->cover(1000, 1000);
            $imagePath = public_path("uploads/pfps") . "/" . $nameImage;
            $imageServer->save($imagePath);
        }

        // save changes
        $user = User::find(auth()->user()->id);
        $user->username = $request->username;
        $user->pfp = $nameImage ?? auth()->user()->pfp ?? "";
        $user->save();

        return redirect()->route("posts.index", $user->username);
    }
}
