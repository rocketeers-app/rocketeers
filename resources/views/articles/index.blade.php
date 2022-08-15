@extends('layouts.master')

@section('title', 'Knowledge - '.config('app.name'))

@section('main')
    <div class="max-w-screen-md mx-auto">
        <h1 class="mb-5 font-extrabold leading-tight text-gray-200 sm:text-4xl">Knowledge</h1>

        @foreach($articles as $article)
        <p class="mb-2"><a href="{{ $article->url }}" class="underline text-emerald-400 hover:text-emerald-200 decoration-2 underline-offset-4">{{ $article->title }}</a></p>
        @endforeach
    </div>
@endsection
