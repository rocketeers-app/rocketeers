<x-page
    :title="$feature->title"
>
    <div class="max-w-screen-md mx-auto">
        <h2 class="mb-4 text-lg font-bold tracking-wide text-gray-600 uppercase md:text-xl">Features</h2>
        <h1 class="mb-5 text-xl font-extrabold leading-tight md:text-4xl text-emerald-400">{{ $feature->title }}</h1>
        <x-markdown class="prose prose-xl text-gray-200 prose-invert">
            {!! $feature->description !!}
        </x-markdown>
    </div>
</x-page>