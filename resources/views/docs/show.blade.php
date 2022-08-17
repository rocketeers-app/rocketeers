<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials.meta')
</head>

<body class="bg-gray-900" x-data="{ menu: false }">
    <header class="container pb-4 mx-auto border-b border-gray-800 md:pb-10">
        <div class="pt-5 md:pt-10">
            <nav class="relative flex items-center justify-between px-4 mx-auto sm:px-6" aria-label="Global">
                <div class="flex items-center flex-1">
                    <div class="flex items-center justify-between w-full md:w-auto">
                        <a href="/" class="text-2xl font-extrabold text-emerald-400 hover:text-emerald-200">
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
                    <a href="{{ route('feature.index') }}" class="hover:text-gray-300">Features</a> <span class="mr-2">|</span>
                    <a href="{{ route('article.index') }}" class="hover:text-gray-300">Knowledge</a> <span class="mr-2">|</span>
                    <a href="{{ route('doc.index') }}" class="hover:text-gray-300">Docs</a> <span class="mr-2">|</span>
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
                        <a href="/">Rocketeers</a>
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
                    <div class="px-2">
                        <a href="{{ route('feature.index') }}" class="block px-4 py-3 text-base font-medium text-gray-200 border-t border-gray-700 rounded-md hover:bg-gray-700">Features</a>
                        <a href="{{ route('article.index') }}" class="block px-4 py-3 text-base font-medium text-gray-200 border-t border-gray-700 rounded-md hover:bg-gray-700">Knowledge</a>
                        <a href="{{ route('doc.index') }}" class="hover:text-gray-300">Docs</a> <span class="mr-2">|</span>
                        <a href="https://rocketeers.app" class="block w-full px-4 py-3 font-medium text-white rounded-md shadow bg-emerald-400 hover:bg-emerald-300">Login&nbsp;&nbsp;<span class="px-2 py-1 text-sm rounded bg-emerald-600">BETA</span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="grid grid-cols-3 gap-4">
        <nav class="min-h-full p-16 overflow-y-scroll border-r border-gray-800">
            @foreach($nav as $category => $items)
                <h2 class="mb-2 text-2xl font-bold text-slate-400">{{ $category }}</h2>
                <ul class="mb-6">
                @foreach($items as $item)
                    <li><a href="{{ route('doc.show', str_slug($category).'/'.str_slug($item)) }}" class="inline-block px-2 py-1 -mx-2 rounded text-slate-400 hover:bg-slate-800">{{ $item }}</a></li>
                @endforeach
                </ul>
            @endforeach
        </nav>
        <main class="container px-4 py-12 mx-auto md:py-20">
            @yield('main')
        </main>
        <aside class="min-h-full p-16 overflow-y-scroll border-r border-gray-700">
            <h2 class="text-slate-200">On This Page</h2>
            <ul>
                <li>...</li>
            </ul>
        </aside>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.5.0/dist/cdn.min.js" defer></script>
</body>
</html>