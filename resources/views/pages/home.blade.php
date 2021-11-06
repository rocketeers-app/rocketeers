@extends('layouts.app')

@section('title', 'Rocketeers')

@section('body')
    <main class="container max-w-screen-md py-10 mx-auto">
        <div class="px-4 mx-auto text-center sm:py-10">
            <h2 class="font-extrabold sm:text-4xl">
                <span class="block text-6xl text-green-400">Sites management for digital agencies and developers</span>
            </h2>
            <p class="max-w-xl mx-auto mt-4 text-xl leading-normal text-white">Always in control in every aspect of your sites and web apps using our SaaS control panel for server hosting, domains,<br>performance, uptime, metrics and more.</p>
            <p class="block m-4 text-xl text-gray-600">Launching in 2022</p>
        </div>
        <form action="#" class="relative max-w-lg mx-auto mt-4">
            <label for="email" class="sr-only">Fill in your email address to get notified</label>
            <input id="email" type="email" class="block w-full py-4 pl-5 text-base text-gray-900 placeholder-gray-500 border border-transparent rounded-md shadow-sm pr-[180px] focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-green-600" placeholder="Leave your email address to stay updated">
            <button type="submit" class="absolute top-0 right-0 px-5 py-4 text-base font-medium text-green-900 bg-green-400 border border-transparent rounded-md rounded-l-none shadow hover:bg-green-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-green-600 sm:px-10">Notify me</button>
        </form>
    </main>
@endsection
