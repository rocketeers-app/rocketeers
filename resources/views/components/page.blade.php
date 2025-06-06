<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @php($title = $title ?? config('app.name').' - Sites management for digital agencies and developers')

    <title>{!! html_entity_decode($title) !!}</title>
    <meta charset="utf-8">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="apple-mobile-web-app-title" content="Rocketeers">
    <meta name="content-type" content="text/html; charset=utf-8">
    <meta name="generator" content="Rocketeers">
    <meta name="robots" content="index,follow">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="author" content="Mark van Eijk">
    @if(filled($description))
    <meta name="description" content="{{ $description }}">
    <meta property="og:description" content="{{ $description }}">
    @endif
    @if(filled($keywords))
    <meta name="keywords" content="{{ $keywords }}">
    @endif
    <x-feed-links />
    <x-og-image-tags :title="$title" subtitle="Rocketeers" />

    @production
    <script src="https://cdn.usefathom.com/script.js" data-site="EXPMPOZO" defer></script>
    <script src="https://analytics.ahrefs.com/analytics.js" data-key="vcdW/eTmVTfa8nVBCnbUyw" async></script>
    @endproduction

    @vite('resources/css/app.css', 'web')
    @vite('resources/js/app.js', 'web')
</head>

<body class="bg-gray-900" x-data="{ menu: false }">
    <header class="container pb-4 mx-auto max-w-screen-xl border-b border-gray-800 md:pb-10">
        <div class="pt-5 md:pt-10">
            <nav class="flex relative justify-between items-center px-4 mx-auto sm:px-6" aria-label="Global">
                <div class="flex flex-1 items-center">
                    <div class="flex justify-between items-center w-full md:w-auto">
                        <a href="/" class="text-2xl font-extrabold text-emerald-400 hover:text-emerald-200">
                            Rocketeers
                        </a>
                        <div class="flex items-center md:hidden">
                            <button type="button" class="inline-flex justify-center items-center p-2 text-gray-400 bg-gray-900 rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus-ring-inset focus:ring-white" aria-expanded="false" @click="menu = true">
                                <span class="sr-only">Open main menu</span>
                                <!-- Heroicon name: outline/menu -->
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="hidden space-x-8 md:flex md:ml-10" x-show="menu">
                        {{-- <a href="#" class="text-base font-medium text-white hover:text-gray-300">Product</a> --}}
                    </div>
                </div>
                <div class="hidden text-base font-medium text-white md:flex md:items-center md:space-x-6">
                    <a href="{{ route('feature.index') }}" class="hover:text-gray-300">Features</a> <span class="mr-2 text-gray-800">|</span>
                    <a href="{{ route('pricing') }}" class="hover:text-gray-300">Pricing</a> <span class="mr-2 text-gray-800">|</span>
                    <a href="{{ route('knowledge') }}" class="hover:text-gray-300">Knowledge</a> <span class="mr-2 text-gray-800">|</span>
                    {{-- <a href="{{ route('doc.index') }}" class="hover:text-gray-300">Docs</a> <span class="mr-2 text-gray-800">|</span> --}}
                    <a href="https://rocketeers.app" class="hover:text-gray-300">
                        Login
                        <span class="inline-flex items-center px-2 py-1 ml-2 text-xs font-medium text-white bg-gray-600 rounded-md border border-transparent hover:bg-gray-700">
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
        <div class="absolute inset-x-0 top-0 z-10 p-2 transition transform origin-top md:hidden" x-show="menu" style="display: none">
            <div class="overflow-hidden bg-gray-800 rounded-lg ring-1 ring-black ring-opacity-5 shadow-md">
                <div class="flex justify-between items-center px-5 pt-4">
                    <div class="text-2xl font-extrabold text-white">
                        <a href="/">Rocketeers</a>
                    </div>
                    <button type="button" class="inline-flex justify-center items-center p-2 text-gray-800 bg-gray-600 rounded-md hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-600" @click="menu = false">
                        <span class="sr-only">Close menu</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="p-3 pb-8">
                    <div class="px-2">
                        <a href="{{ route('feature.index') }}" class="block px-4 py-3 text-base font-medium text-gray-200 rounded-md border-t border-gray-700 hover:bg-gray-700">Features</a>
                        <a href="{{ route('pricing') }}" class="block px-4 py-3 text-base font-medium text-gray-200 rounded-md border-t border-gray-700 hover:bg-gray-700">Pricing</a>
                        <a href="{{ route('knowledge') }}" class="block px-4 py-3 text-base font-medium text-gray-200 rounded-md border-t border-gray-700 hover:bg-gray-700">Knowledge</a>
                        {{-- <a href="{{ route('doc.index') }}" class="hover:text-gray-300">Docs</a> <span class="mr-2">|</span> --}}
                        <a href="https://rocketeers.app" class="block px-4 py-3 w-full font-medium text-white bg-emerald-400 rounded-md shadow hover:bg-emerald-300">Login&nbsp;&nbsp;<span class="px-2 py-1 text-sm bg-emerald-600 rounded">BETA</span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="container px-4 py-12 mx-auto md:py-20">
        {{ $slot }}
    </main>
    <footer class="pb-8 bg-[#0d1117] md:pb-16">
        <div class="container px-6 py-16 mx-auto max-w-screen-xl border-b border-gray-800 md:px-8">
            <div class="grid gap-8 lg:gap-6 lg:grid-cols-2">
                <div class="border-r border-gray-800">
                    <h2 class="mb-4 text-sm tracking-wide text-gray-500 uppercase">Knowledge</h2>
                    <ul class="leading-loose">
                        @foreach($categories as $category)
                        <li><a href="{{ route('knowledge', ['slug' => str_slug($category)]) }}" class="text-white">{{ $category }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h2 class="mb-4 text-sm tracking-wide text-gray-500 uppercase">Information</h2>
                    <ul class="leading-loose">
                        <li><a href="{{ route('feature.index') }}" class="text-white">Features</a></li>
                        <li><a href="{{ route('knowledge') }}" class="text-white">Knowledge</a></li>
                        {{-- <li><a href="{{ route('doc.index') }}" class="text-white">Docs</a></li> --}}
                        <li><a href="{{ route('contact') }}" class="text-white">Contact</a></li>
                    </ul>
                    <h2 class="my-4 text-sm tracking-wide text-gray-500 uppercase">Rocketeers</h2>
                    <ul class="leading-loose">
                        <li><a href="https://rocketeers.app" class="text-white">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <p class="mt-8 text-base text-center text-gray-500">
            &copy; {{ date('Y') }} Mark van Eijk - All rights reserved.

            @if(isset($sourceUrl))
            <a href="{{ $sourceUrl }}" target="_blank" rel="noopener" class="underline">View source of this page</a>
            @endif

            Hosted by <a href="https://m.do.co/c/0801ad4bd810" target="_blank" rel="noopener" class="underline">DigitalOcean</a> - analytics by <a href="https://usefathom.com/ref/WCCANW" target="_blank" rel="noopener" class="underline">Fathom</a>
        </p>
    </footer>
</body>

</html>
