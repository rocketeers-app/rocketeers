@extends('layouts.app')

@section('title', 'Rocketeers')

@section('body')
    @foreach($posts as $post)
    <h3 class="font-bold"><a href="{{ $post->url }}">{{ $post->title }}</a></h3>
    <p>{{ $post->intro }}</p>
    @endforeach
@endsection
