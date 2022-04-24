<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Articles</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="py-6">
                        <x-button-link :href="route('articles.create')">
                            {{ __('New Article') }}
                        </x-button-link>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Title</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Date</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Published at</div>
                                </th>
                                @if(auth()->user()->IsAdmin())
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">User</div>
                                    </th>
                                @endif
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Action</div>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                            @forelse($articles as $article)
                                <tr>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-lg text-left">{{ $article->title }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">{{ $article->created_at }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">{{ $article->published_at }}</div>
                                    </td>
                                    @if(auth()->user()->IsAdmin())
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">{{ $article->user->name }}</div>
                                        </td>
                                    @endif
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex align-middle">
                                            <x-button-link :href="route('articles.edit', $article)">
                                                {{ __('Edit') }}
                                            </x-button-link>
                                            <x-form-button
                                                :action="route('articles.destroy', $article)"
                                                method="DELETE"
                                                class="ml-1 inline-flex items-center px-4 py-2 rounded-md bg-red-500 text-white uppercase text-xs"
                                            >
                                                {{ __('Delete') }}
                                            </x-form-button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td><div class="p-2 text-lg text-left">No Articles</div></td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
