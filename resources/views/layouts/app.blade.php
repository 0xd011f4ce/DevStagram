<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | DevStagram</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">DevStagram</h1>

            @auth
                <nav class="flex gap-2 items-center">
                    <a class="font-bold text-gray-600 text-sm" href="#">
                        Hello, <span class="font-normal">{{ auth()->user()->username }}</span>
                    </a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="#">Logout</a>
                </nav>
            @else
                <nav class="flex gap-2 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="#">Login</a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('signup') }}">Sign Up</a>
                </nav>
            @endauth
        </div>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">
            @yield('title')
        </h2>
        @yield('content')
    </main>

    <footer class="text-center p-5 text-gray-500 font-bold uppercase mt-10">
        DevStagram - {{ date('Y') }} All rights reserved.
    </footer>

</body>

</html>
