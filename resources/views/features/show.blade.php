@extends('layouts.app')

@section('title', $feature->title. ' - '. config('app.name'))

@section('body')
    <div class="container max-w-screen-md p-5 mx-auto md:pt-20">
        <h1 class="mb-5 text-4xl font-extrabold leading-tight text-emerald-400">{{ $feature->title }}</h1>
        <x-markdown class="prose prose-xl text-gray-200 prose-invert">
            {!! $feature->description !!}
        </x-markdown>
    </div>
@endsection
