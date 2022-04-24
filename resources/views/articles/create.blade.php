<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">New Article</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('articles.store') }}">
                    @csrf
                    <!-- Title -->
                        <div>
                            <x-label for="title" :value="__('Title')"/>

                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
                                     required autofocus/>
                        </div>

                        <!-- Full Text -->
                        <div class="mt-4">
                            <x-label for="full_text" :value="__('Full Text')"/>

                            <x-textarea class="block mt-1 w-full" name="full_text" required></x-textarea>
                        </div>

                        <!-- Categories -->
                        <div class="mt-4">
                            <label for="category_id">Category</label>

                            <select class="block mt-1 w-full" name="category_id" id="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Add') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
