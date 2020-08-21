@extends('layouts.app')

@section('title', 'Rocketeers')

@section('body')
    @foreach($posts as $post)
    <h2><a href="{{ $post->url }}">{{ $post->title }}</a></h2>
    <p>{{ $post->intro }}</p>
    @endforeach
@endsection
