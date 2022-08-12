@extends('layouts.app')

@section('title', $article->title. ' - '. config('app.name'))

@section('body')
    <div class="container max-w-screen-md p-5 mx-auto md:pt-20">
        <h1 class="mb-5 text-xl font-extrabold leading-tight text-white md:text-4xl">{{ $article->title }}</h1>
        <x-markdown class="prose text-gray-200 md:prose-xl prose-invert">
            {!! $article->content !!}
        </x-markdown>
        <p class="mt-5 text-gray-500">Published on {{ $article->date->format('F j, Y') }}</p>
    </div>
@endsection
