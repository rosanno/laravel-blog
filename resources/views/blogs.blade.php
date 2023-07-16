<x-app-layout>
    <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Blogs') }}
            </h2>
        </x-slot>

        <div>
            @if (count($blogs) === 0)
                <h1>Blogs is empty</h1>
            @else
                @foreach ($blogs as $blog)
                    <div class="bg-white border rounded-md shadow-sm my-5 p-5">
                        <a href="{{ route('blog.show', $blog->id) }}">
                            <h1 class="text-lg font-bold truncate">{{ $blog->title }}</h1>
                            <p class="text-sm py-2">{{ $blog->content }}</p>
                            <h3 class="text-sm text-gray-400 mt-2">{{ $blog->author }}</h3>
                        </a>
                        @auth
                            <div class="mt-5 flex items-center space-x-3">
                                <a href="{{ route('blog.edit', $blog->id) }}" class="text-green-400"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ route('blog.delete', $blog->id) }}" class="mt-auto text-red-500"><i class="fa-solid fa-trash"></i></a>
                            </div>
                        @endauth
                    </div>
                @endforeach
            @endif
        </div>

    </section>
</x-app-layout>
