<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name').' - Sites management for digital agencies and developers')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @env('production')
        <script src="https://cdn.usefathom.com/script.js" data-site="EXPMPOZO" defer></script>
    @endenv
</head>

<body class="bg-gray-900" x-data="{ menu: false }">
    <div class="relative overflow-hidden">
        <header class="relative">
            <div class="pt-5 bg-gray-900 md:pt-10">
                <nav class="relative flex items-center justify-between px-4 mx-auto max-w-7xl sm:px-6"
                    aria-label="Global">
                    <div class="flex items-center flex-1">
                        <div class="flex items-center justify-between w-full md:w-auto">
                            <a href="/" class="text-2xl font-extrabold text-emerald-400 hover:text-gray-200">
                                Rocketeers
                            </a>
                            <div class="flex items-center md:hidden">
                                <button type="button"
                                    class="inline-flex items-center justify-center p-2 text-gray-400 bg-gray-900 rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus-ring-inset focus:ring-white"
                                    aria-expanded="false" @click="menu = true">
                                    <span class="sr-only">Open main menu</span>
                                    <!-- Heroicon name: outline/menu -->
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="hidden space-x-8 md:flex md:ml-10" x-show="menu">
                            {{-- <a href="#" class="text-base font-medium text-white hover:text-gray-300">Product</a> --}}
                        </div>
                    </div>
                    <div class="hidden text-base font-medium text-white md:flex md:items-center md:space-x-6">
                        <a href="{{ route('post.index') }}" class="hover:text-gray-300">Posts</a> <span class="mr-2">|</span>
                        <a href="https://rocketeers.app" class="hover:text-gray-300">
                            Login
                            <span
                                class="inline-flex items-center px-2 py-1 ml-2 text-xs font-medium text-white bg-gray-600 border border-transparent rounded-md hover:bg-gray-700">
                                BETA
                            </span>
                        </a>
                    </div>
                </nav>
            </div>

            <!--
            Mobile menu, show/hide based on menu open state.

            Entering: "duration-150 ease-out"
              From: "opacity-0 scale-95"
              To: "opacity-100 scale-100"
            Leaving: "duration-100 ease-in"
              From: "opacity-100 scale-100"
              To: "opacity-0 scale-95"
          -->
            <div class="absolute inset-x-0 top-0 z-10 p-2 transition origin-top transform md:hidden" x-show="menu"
                style="display: none">
                <div class="overflow-hidden bg-gray-800 rounded-lg shadow-md ring-1 ring-black ring-opacity-5">
                    <div class="flex items-center justify-between px-5 pt-4">
                        <div class="text-2xl font-extrabold text-white">
                            Rocketeers
                        </div>
                        <button type="button"
                            class="inline-flex items-center justify-center p-2 text-gray-800 bg-gray-600 rounded-md hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-600"
                            @click="menu = false">
                            <span class="sr-only">Close menu</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="p-3 pb-8">
                        <div class="px-2 space-y-1">
                            <a href="{{ route('post.index') }}" class="block px-4 py-3 mb-4 text-base font-medium text-gray-200 rounded-md hover:bg-gray-700">Knowledge</a>
                            <a href="https://rocketeers.app"
                                class="block w-full px-4 py-3 font-medium text-white rounded-md shadow bg-emerald-400 hover:bg-emerald-500">Login
                                <span class="px-2 py-1 text-sm rounded bg-emerald-600">BETA</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            @yield('body')
        </main>
        <footer class="pt-8 mt-12 border-t border-gray-800">
            <p class="text-base text-center text-gray-600">
                &copy; {{ date('Y') }} Mark van Eijk - All rights reserved.
            </p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.5.0/dist/cdn.min.js" defer></script>
</body>
</html>
