<x-page
    title="Sites management for Digital Agencies"
>
    <div class="max-w-screen-md mx-auto">
        <div class="max-w-xl mx-auto text-center">
            <h2 class="mb-4 text-sm font-bold tracking-wide text-gray-600 uppercase md:text-xl">Self-host and manage all your sites on different providers easily</h2>
            <h1 class="mb-4 text-2xl font-extrabold leading-tight text-white md:text-5xl">Sites management for Digital Agencies</h1>
            <div class="my-10 mb-10 text-xl leading-relaxed text-gray-200">
                <p>Increasingly more digital agencies are offering their clients an full-service with development services and also hosting the online product.</p>
            </div>
        </div>

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
    </div>
</x-page>
