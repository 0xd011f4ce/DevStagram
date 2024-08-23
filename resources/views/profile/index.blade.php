@extends('layouts.app')

@section('title', 'Edit profile')

@section('content')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{ route('profile.store') }}" method="POST" class="mt-10 md:mt-0">
                @csrf

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input id="username" name="username" type="text" placeholder="Username"
                        class="border p-3 w-full rounded-lg @error('username')border-red-500 @enderror"
                        value="{{ auth()->user()->username }}">

                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="pfp" class="mb-2 block uppercase text-gray-500 font-bold">Profile Picture</label>
                    <input id="pfp" name="pfp" type="file" class="border p-3 w-full rounded-lg"
                        accept=".jpg, .jpeg, .png, .gif">
                </div>

                <input type="submit" value="Save Changes"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
