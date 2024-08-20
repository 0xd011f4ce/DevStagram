@extends('layouts.app')

@section('title')
    Profile of: {{ $user->username }}
@endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">

            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="profile picture">
            </div>

            <div class="md:w-8/12 lg:w-6/12 px-5 md:flex md:flex-col md:justify-center py-10">
                <p class="text-gray-700 text-2xl">{{ $user->username }}</p>

                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    0
                    <span class="font-normal">Followers</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Following</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Posts</span>
                </p>
            </div>

        </div>
    </div>
@endsection
