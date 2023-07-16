<x-app-layout>
    <section  class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create a blog') }}
            </h2>
        </x-slot>

        <div class="mt-10">
            <form action="{{ route('blog.store') }}" method="POST">
                @csrf
                <div class="flex flex-col space-y-3">
                    <label class="text-lg">Title</label>
                    <input type="text" name="title" class="border border-gray-200 p-2 rounded-md">
                </div>
                <div class="flex flex-col space-y-3 mt-4">
                    <label class="text-lg">Content</label>
                    <textarea name="content" class="border border-gray-200 rounded-md p-2" rows="7"></textarea>
                </div>
                <div class="mt-5">
                    <button
                        class="bg-slate-900 hover:bg-slate-700 transition-colors duration-300 text-white rounded-md py-2 px-5"
                        type="submit">Create</button>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
