<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }} - Sites management for digital agencies and developers</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @env('production')
        <script src="https://cdn.usefathom.com/script.js" data-site="EXPMPOZO" defer></script>
        @endenv
    </head>
    <body class="bg-gray-900">
        @yield('body')
        <footer class="pt-8 mt-12 border-t border-gray-800">
          <p class="text-base text-gray-600 xl:text-center">
            &copy; {{ date('Y') }} Mark van Eijk - All rights reserved.
          </p>
        </footer>
    </body>
</html>
