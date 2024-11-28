@foreach(config('open-graph-image.metatags') as $property => $key)
    @if($attributes->has($key))
    <meta property="{{ $property }}" content="{{ $attributes->get($key) }}">
    @endif
@endforeach

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@rocketeers_app">
<meta name="twitter:creator" content="@markvaneijk">

<meta property="og:image" content="{!! og($attributes) !!}">
<meta property="og:image:type" content="image/{{ config('open-graph-image.image.extension') }}">
<meta property="og:image:width" content="{{ config('open-graph-image.image.width') }}">
<meta property="og:image:height" content="{{ config('open-graph-image.image.height') }}">
