@extends ("layouts.app")

@section('title', 'Main Page')

@section('content')

    <x-list-post :posts="$posts" />

@endsection
