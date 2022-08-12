@extends('layouts.app')

@section('title', 'Knowledge - '.config('app.name'))

@section('body')
    <div class="container max-w-screen-md p-5 mx-auto md:p-10">
        <h1 class="mb-5 font-extrabold leading-tight text-gray-200 sm:text-4xl">Knowledge</h1>

        @foreach($posts as $post)
        <p class="mb-2"><a href="{{ $post->url }}" class="text-white border-b-2 border-emerald-200">{{ $post->title }}</a></p>
        @endforeach
    </div>
@endsection
