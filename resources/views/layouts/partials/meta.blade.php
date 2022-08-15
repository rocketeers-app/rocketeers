@php($title = app()->view->getSections()['title'] ?? config('app.name').' - Sites management for digital agencies and developers')

<meta charset="utf-8">
<title>{{ $title }}</title>
<link rel="canonical" href="{{ url()->current() }}">
@if(isset($description))
<meta name="description" content="{{ $description }}">
<meta property="og:description" content="{{ $description }}">
@endif
@if(isset($keywords))
<meta name="keywords" content="{{ $keywords }}">
@endif
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="apple-mobile-web-app-title" content="Rocketeers">
<meta property="author" content="Mark van Eijk">
<meta name="generator" content="Rocketeers">
<meta name="robots" content="index,follow">
<meta property="og:title" content="{{ $title }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{!! url()->signedRoute('open-graph-image-file', compact('title')) !!}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
@if(app()->view->getSections()['created_at'])
<meta property="article:published_time" content="{{ app()->view->getSections()['created_at'] }}">
@endif
@if(app()->view->getSections()['updated_at'])
<meta property="article:modified_time" content="{{ app()->view->getSections()['updated_at'] }}">
@endif
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@env('production')
    <script src="https://cdn.usefathom.com/script.js" data-site="EXPMPOZO" defer></script>
@endenv
