<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="https://cdn.usefathom.com/script.js" data-site="EXPMPOZO" defer></script>
    </head>
    <body>
        <main class="container mx-auto">
            @yield('body')
        </main>
    </body>
</html>
