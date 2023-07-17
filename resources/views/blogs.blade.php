<x-app-layout>
    <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Blogs') }}
            </h2>
        </x-slot>

        <div>
            @if (count($blogs) === 0)
                <h1 class="text-2xl font-semibold text-gray-400 flex justify-center mt-36">Blogs is empty</h1>
            @else
                @foreach ($blogs as $blog)
                    <div class="bg-white border rounded-md shadow-sm my-5 p-5">
                        <h1 class="text-lg font-bold truncate">{{ $blog->title }}</h1>
                        <p class="text-sm py-2">{{ Str::limit($blog->content, 250) }} <a
                                class="block pt-5 text-blue-500 font-bold underline w-max" href="{{ route('blog.show', $blog->id) }}"
                                href="">Read</a></p>
                        <h3 class="text-sm text-gray-400 mt-2">{{ $blog->author }}</h3>
                        @auth
                            <div class="mt-5 flex items-center space-x-3">
                                <a href="{{ route('blog.edit', $blog->id) }}" class="text-green-400"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ route('blog.delete', $blog->id) }}" class="mt-auto text-red-500"><i
                                        class="fa-solid fa-trash"></i></a>
                            </div>
                        @endauth
                    </div>
                @endforeach
                <div class="mb-10">
                    {{ $blogs->links() }}
                </div>
            @endif
        </div>

    </section>
</x-app-layout>
