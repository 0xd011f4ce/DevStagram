@extends ("layouts.app")

@section('title', 'Main Page')

@section('content')

    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
                        <img src="{{ asset('uploads') . '/' . $post->image }}" alt="{{ $post->title }}">
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">No posts yet. Be the first one!</p>
    @endif

@endsection
