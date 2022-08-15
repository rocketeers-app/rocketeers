@extends('layouts.master')

@section('title', $article->title. ' - '. config('app.name'))
@section('created_at', $article?->created_at?->format('Y-m-d'))
@section('updated_at', $article?->updated_at?->format('Y-m-d'))

@section('main')
    <div class="max-w-screen-md mx-auto">
        <h2 class="mb-4 text-lg font-bold tracking-wide text-gray-600 uppercase md:text-xl">Knowledge</h2>
        <h1 class="mb-5 text-xl font-extrabold leading-tight text-white md:text-4xl">{{ $article->title }}</h1>
        <x-markdown class="prose text-gray-200 md:prose-xl prose-invert">
            {!! $article->content !!}
        </x-markdown>
        <p class="mt-5 text-gray-500">
            Published on {{ $article->created_at->format('F j, Y') }}
            @if($article->updated_at)
            <br>Updated on {{ $article->updated_at->format('F j, Y') }}
            @endif
        </p>
    </div>
@endsection
