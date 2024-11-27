<x-page
    title="Features"
>
    <h1 class="mb-8 text-xl font-extrabold leading-tight text-center text-white md:mb-16 sm:text-4xl">Every feature to manage<br>servers and sites with ease</h1>

    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach($features as $feature)
        <a href="{{ $feature->url }}" class="block p-6 text-white rounded-md group hover:bg-gray-800">
            <h2 class="inline-block mb-2 text-lg font-bold underline md:text-xl text-emerald-400 group-hover:text-emerald-200 decoration-2 underline-offset-4">{{ $feature->title }}</h2>
            <p class="leading-loose">{{ $feature->description }}</p>
        </a>
        @endforeach
    </div>

    <h2 class="mt-8 mb-2 text-xl font-bold text-white md:text-2xl md:mt-20">The little big details</h2>
    <ul class="leading-loose">
        @foreach($littleBigDetails as $detail)
        <li class="text-gray-400">... {{ $detail->title }}</li>
        @endforeach
    </ul>
</x-page>
