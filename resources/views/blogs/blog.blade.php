<x-app-layout>
    <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-10 py-2 mb-10">
            <h1 class="text-3xl font-bold truncate">{{ $blog->title }}</h1>
            <p class="mt-5 leading-8 text-left">{{ $blog->content }}</p>
        </div>
    </section>
</x-app-layout>
