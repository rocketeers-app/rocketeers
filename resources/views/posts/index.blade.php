<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Rocketeers</title>
    </head>
    <body>
        @foreach($posts as $post)
        <h2><a href="{{ $post->url }}">{{ $post->title }}</a></h2>
        <p>{{ $post->intro }}</p>
        @endforeach
    </body>
</html>
