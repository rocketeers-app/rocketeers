<x-page
    :title="$category ?? 'Knowledge'"
>
    <div class="max-w-screen-md mx-auto">
        @if(isset($category))
        <p class="mb-2"><a href="{{ route('knowledge') }}" class="text-gray-400">&larr; Back to knowledge</a></p>
        @endif
        <h1 class="mb-5 text-2xl font-extrabold leading-tight text-gray-200 sm:text-4xl">{{ $category ?? 'Knowledge' }}</h1>

        @if(!isset($category))
        <h2 class="mt-10 mb-5 text-lg font-extrabold text-gray-200 sm:text-2xl">Categories</h2>
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach($categories as $slug => $name)
            <a href="{{ route('knowledge', ['slug' => $slug]) }}" class="block p-3 pb-2 text-white border border-gray-800 rounded-md sm:p-6 sm:pb-5 group hover:bg-gray-800">
                <h2 class="inline-block mb-2 font-bold underline sm:text-lg md:text-xl text-emerald-400 group-hover:text-emerald-200 decoration-2 underline-offset-4">{{ $name }}</h2>
            </a>
            @endforeach
        </div>
        @endif

        @if(!isset($category))
        <h2 class="mt-10 text-lg font-extrabold text-gray-200 sm:text-2xl">Latest articles</h2>
        @endif
        @php($previousDate = null)
        @foreach($articles as $article)
        <p class="mb-2 text-gray-600">
            @if($article->published_at != $previousDate)
            <span class="block mt-5 mb-1">{{ $article->published_at->format('j F') }}</span>
            @endif
            <a href="{{ $article->url }}" class="underline text-emerald-400 hover:text-emerald-200 decoration-2 underline-offset-4">{{ $article->title }}</a>
        </p>
        @php($previousDate = $article->published_at)
        @endforeach
    </div>
</x-page>
