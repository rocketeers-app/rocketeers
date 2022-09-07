@php($title = app()->view->getSections()['title'] ?? config('app.name').' - Sites management for digital agencies and developers')

<meta charset="utf-8">
<title>{{ $title }}</title>
<link rel="canonical" href="{{ url()->current() }}">
@if(isset(app()->view->getSections()['description']))
<meta name="description" content="{{ app()->view->getSections()['description'] }}">
@endif
@if(isset(app()->view->getSections()['keywords']))
<meta name="keywords" content="{{ app()->view->getSections()['keywords'] }}">
@endif
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="apple-mobile-web-app-title" content="Rocketeers">
<meta property="author" content="Mark van Eijk">
<meta name="generator" content="Rocketeers">
<meta name="robots" content="index,follow">
<meta property="og:title" content="{{ $title }}">
@if(isset(app()->view->getSections()['description']))
<meta property="og:description" content="{{ app()->view->getSections()['description'] }}">
@endif
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{!! url()->signedRoute('open-graph-image', compact('title')) !!}">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
@if(isset(app()->view->getSections()['published_at']))
<meta property="article:published_time" content="{{ app()->view->getSections()['published_at'] }}">
@endif
@if(isset(app()->view->getSections()['updated_at']))
<meta property="article:modified_time" content="{{ app()->view->getSections()['updated_at'] }}">
@endif
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@rocketeersapp">
<meta name="twitter:creator" content="@markvaneijk">
<meta name="twitter:title" content="{{ $title }}">
@if(isset(app()->view->getSections()['description']))
<meta name="twitter:description" content="{{ app()->view->getSections()['description'] }}">
@endif
<meta name="twitter:image:src" content="{!! url()->signedRoute('open-graph-image', compact('title')) !!}">
