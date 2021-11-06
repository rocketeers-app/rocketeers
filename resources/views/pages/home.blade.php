@extends('layouts.app')

@section('title', 'Rocketeers')

@section('body')
    <main class="container max-w-screen-md pt-5 mx-auto md:pt-10">
        <div class="px-4 py-10 mx-auto text-center">
            <h2 class="block text-3xl font-extrabold text-green-400 sm:text-6xl">
                Sites management for digital agencies and developers
            </h2>
            <p class="block m-4 text-base text-gray-600 sm:text-xl">Launching in 2022</p>
            <p class="max-w-xl mx-auto mt-4 text-base leading-normal text-white sm:text-xl">Always in control in every aspect of your sites and web apps using our SaaS control panel for server hosting, domains,<br>performance, uptime, metrics and more.</p>
        </div>
        @if(session('message'))
            <div class="mt-4 font-bold text-center text-green-400">
                {{ session('message') }}
            </div>
        @else
            <div class="px-4">
                <form action="/subscribe" method="post" class="relative max-w-lg mx-auto mt-1 md:mt-4">
                    @csrf
                    <label for="email" class="sr-only">Fill in your email address to get notified</label>
                    <input id="email" type="email" name="email" class="block w-full py-4 pl-5 text-base text-gray-900 placeholder-gray-500 border border-transparent rounded-md shadow-sm pr-[140px] sm:pr-[180px] focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-green-600" placeholder="Email address" required>
                    <button type="submit" class="absolute top-0 right-0 px-5 py-4 text-base font-medium text-green-900 bg-green-400 border border-transparent rounded-md rounded-l-none shadow hover:bg-green-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-green-600 sm:px-10">Notify me</button>
                </form>
            </div>
        @endif
    </main>
@endsection
