<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Article</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('articles.update', $article) }}">
                    @csrf
                    @method('PUT')
                    <!-- Title -->
                        <div>
                            <x-label for="title" :value="__('Title')"/>

                            <x-input id="title" class="block mt-1 w-full" type="text" name="title"
                                     :value="$article->title"
                                     required autofocus/>
                        </div>

                        <!-- Full Text -->
                        <div class="mt-4">
                            <x-label for="full_text" :value="__('Full Text')"/>

                            <x-textarea name="full_text" rows="5" class="block mt-1 w-full">{{ $article->full_text }}</x-textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
