@extends('templates.master')

@section('title', $article->title. ' - '. config('app.name'))
@section('published_at', $article?->published_at?->format('Y-m-d'))
@section('updated_at', $article?->updated_at?->format('Y-m-d'))

@section('main')
    <div class="max-w-screen-md mx-auto">
        <div class="max-w-xl mx-auto text-center">
            <h2 class="mb-4 text-sm font-bold tracking-wide text-gray-600 uppercase md:text-xl">Knowledge</h2>
            <h1 class="mb-4 text-2xl font-extrabold leading-tight text-white md:text-5xl">{{ $article->title }}</h1>
            <h3 class="mb-4"><a href="{{ route('knowledge', ['slug' => str_slug($article->category)]) }}" class="text-xl font-extrabold text-gray-600 md:text-2xl">#{{ str_replace(' ', '', $article->category) }}</a></h3>
            <div class="mb-10">
                @if($article->intro)
                <p class="my-10 text-2xl leading-relaxed text-gray-200">{{ $article->intro }}</p>
                @endif
                <p class="text-gray-500">
                    Published by <x-link href="https://twitter.com/markvaneijk">Mark van Eijk</x-link> on {{ $article->published_at->format('F j, Y') }}
                    @if($article->updated_at)
                    <br>Updated on {{ $article->updated_at->format('F j, Y') }}
                    @endif
                    &middot; {{ read_time($article->content) }}
                </p>
            </div>
        </div>
        <x-markdown
            class="prose text-gray-200 prose-h2:mb-3 prose-h2:text-emerald-400 prose-h2:text-3xl prose-h3:text-2xl md:prose-pre:-mx-10 lg:prose-pre:-mx-24 xl:prose-pre:-mx-32 prose-pre:-mx-4 md:prose-pre:p-10 prose-pre:py-10 md:prose-h2:mb-4 prose-pre:!bg-[#0d1117] md:prose-xl prose-invert prose-a:underline prose-a:!text-emerald-400 prose-a:opacity-100 hover:prose-a:text-emerald-200 prose-a:decoration-2 prose-a:underline-offset-4">
            {!! $article->content !!}
        </x-markdown>
        @if(session('message'))
            <div class="mt-4 font-bold text-center text-emerald-400">
                {{ session('message') }}
            </div>
        @else
            <div class="p-16 text-center border-gray-800 border-y-4 mt-14">
                <h3 class="mb-5 text-xl font-extrabold text-white sm:text-2xl">Subscribe to our newsletter</h3>
                <p class="max-w-md mx-auto mb-8 leading-relaxed text-gray-300 sm:text-lg">Do you want to receive regular updates with fresh and exclusive content to learn more about web development, hosting, security and performance? Subscribe now!</p>
                <form action="/subscribe" method="post" class="relative max-w-lg mx-auto mt-1 md:mt-4">
                    @csrf
                    <label for="email" class="sr-only">Fill in your email address to receive updates</label>
                    <input id="email" type="email" name="email" class="block w-full py-4 pl-5 text-base text-gray-900 placeholder-gray-500 border border-transparent rounded-md shadow-sm pr-[140px] sm:pr-[180px] focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-emerald-600" placeholder="Email address" required>
                    <button type="submit" class="absolute top-0 right-0 px-5 py-4 text-base font-medium border border-transparent rounded-md rounded-l-none shadow text-emerald-900 bg-emerald-400 hover:bg-emerald-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-emerald-600 sm:px-10">Subscribe</button>
                </form>
            </div>
        @endif

        @if($relatedArticles->count())
        <h1 class="mt-10 mb-10 text-2xl font-extrabold leading-tight text-gray-200 md:mt-20 sm:text-4xl">Related articles</h1>
        <div class="grid gap-10 md:grid-cols-2">
            @foreach($relatedArticles as $relatedArticle)
            <div>
                <h2><a href="{{ $relatedArticle->url }}" class="text-lg underline md:text-xl text-emerald-400 hover:text-emerald-200 decoration-2 underline-offset-4">{{ $relatedArticle->title }}</a></h2>
                <p class="my-2.5 md:my-5 text-base leading-relaxed text-gray-200">{{ $article->intro }}</p>
                <p><a href="{{ $relatedArticle->url }}" class="text-emerald-400 hover:text-emerald-200 decoration-2 underline-offset-4">Read more &rarr;</a></p>
            </div>
            @endforeach
        </div>
        @endif
    </div>
@endsection
