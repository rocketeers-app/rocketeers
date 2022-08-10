@extends('layouts.app')

@section('title', $post->title. ' - '. config('app.name'))

@section('body')
    <div class="container max-w-screen-md pt-5 mx-auto md:pt-10">
        <h1 class="mb-5 text-4xl font-extrabold leading-tight text-gray-200">{{ $post->title }}</h1>
        <x-markdown class="prose prose-xl text-gray-200 prose-invert">
            {!! $post->content !!}
        </x-markdown>
        <p class="mt-5 text-gray-500">Published on {{ $post->date->format('F j, Y') }}</p>
    </div>
@endsection
