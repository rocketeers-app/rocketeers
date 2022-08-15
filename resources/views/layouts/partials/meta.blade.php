@php($title = app()->view->getSections()['title'] ?? config('app.name').' - Sites management for digital agencies and developers')

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="apple-mobile-web-app-title" content="Rocketeers">
<meta name="generator" content="Rocketeers">
<meta name="robots" content="index,follow">
<title>{{ $title }}</title>
@if(isset($description))
<meta name="description" content="{{ $description }}">
<meta property="og:description" content="{{ $description }}">
@endif
@if(isset($keywords))
<meta name="keywords" content="{{ $keywords }}">
@endif
<meta property="og:title" content="{{ $title }}">
<meta property="og:author" content="Mark van Eijk">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{!! url()->signedRoute('open-graph-image-file', compact('title')) !!}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<link rel="canonical" href="{{ url()->current() }}">
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@env('production')
    <script src="https://cdn.usefathom.com/script.js" data-site="EXPMPOZO" defer></script>
@endenv
