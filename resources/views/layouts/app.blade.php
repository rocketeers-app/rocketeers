<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @env('production')
        <script src="https://cdn.usefathom.com/script.js" data-site="EXPMPOZO" defer></script>
        @endenv
    </head>
    <body>
        <main class="container max-w-screen-sm py-10 mx-auto">
            <div class="prose-xl">
                Hi! I'm <a href="https://twitter.com/markvaneijk" class="font-semibold">Mark van Eijk</a>, co-founder and Chief Tech at <a href="https://vormkracht10.nl" class="font-semibold">Vormkracht10</a>,<br>Full-Stack Maker of Webs and now building  🚀 <a href="https://rocketeers.app" class="font-semibold">Rocketeers</a>.
            </div>
            <div class="prose-xl">
                @yield('body')
            </div>
        </main>
    </body>
</html>
