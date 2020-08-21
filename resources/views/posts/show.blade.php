@extends('layouts.app')

@section('title', $post->title)

@section('body')
    <h1>{{ $post->title }}</h1>
    {{ $post->contents }}
@endsection
