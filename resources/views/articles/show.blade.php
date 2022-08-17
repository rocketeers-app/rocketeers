@extends('templates.master')

@section('title', $article->title. ' - '. config('app.name'))
@section('published_at', $article?->published_at?->format('Y-m-d'))
@section('updated_at', $article?->updated_at?->format('Y-m-d'))

@section('main')
    <div class="max-w-screen-md mx-auto">
        <h2 class="mb-4 text-lg font-bold tracking-wide text-gray-600 uppercase md:text-xl">Knowledge</h2>
        <h1 class="mb-5 text-xl font-extrabold leading-tight text-white md:text-5xl">{{ $article->title }}</h1>
        <p class="mb-5 text-gray-500">
            Published on {{ $article->published_at->format('F j, Y') }}
            @if($article->updated_at)
            <br>Updated on {{ $article->updated_at->format('F j, Y') }}
            @endif
        </p>
        <x-markdown class="prose text-gray-200 md:prose-xl prose-invert prose-a:underline prose-a:text-emerald-400 hover:prose-a:text-emerald-200 prose-a:decoration-2 prose-a:underline-offset-4">
            {!! $article->content !!}
        </x-markdown>
    </div>
@endsection
