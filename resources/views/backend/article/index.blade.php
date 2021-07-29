<x-backend_app-layout>
    <x-slot name="title">
        {{ __('Article list') }}
    </x-slot>
    
    <!-- Header + Create new -->
    <div class="mb-8 flex items-center">
        <div class="p-4 text-3xl mr-auto">
            {{ __('Article list') }}
        </div>
        <a class="flex items-center mr-4 p-2 bg-green-500 hover:bg-green-900 rounded" href="{{ route('backend_article.create') }}">
            <span class="inline-block">
                <x-add-icon class="h-4 w-4 text-white" />
            </span>
            <span class="text-sm pl-1 text-white">{{ __('Create New') }}</span>
        </a>
    </div>
    <div class="shadow mx-0">
        <div class="py-8">
            <div class="container px-4 mx-auto">
                <!-- Paginate -->
                <div class="flex justify-end pb-4">
                    <div class="w-auto mr-4 flex items-center">
                        <p class="mr-3 text-sm">{{ __('Rows')}}</p>
                        <div class="flex bg-white border border-gray-100 rounded">
                            <select class="text-sm border-0 w-full" name="paginate" id="paginate">
                                @foreach([5,10,20,50] as $length)
                                    <option value="{{ $length }}" {{ request('length') == $length ? 'selected' : '' }}>{{ $length }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Data table -->
                <div class="px-4 py-4 overflow-x-auto">
                    <table class="table-auto w-full text-center text-sm">
                        <thead>
                            <tr>
                                <th class="border px-2 py-2">{{ __('ID') }}</th>
                                <th class="border px-2 py-2">{{ __('User created') }}</th>
                                <th class="border px-2 py-2">{{ __('Image') }}</th>
                                <th class="border px-2 py-2">{{ __('Title') }}</th>
                                <th class="border px-2 py-2">{{ __('Content') }}</th>
                                <th class="border px-2 py-2">{{ __('Created at') }}</th>
                                <th class="border px-2 py-2">{{ __('Updated at') }}</th>
                                <th class="border px-2 py-2">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($articles as $article)
                                <tr>
                                    <td class="border px-2 py-2">{{ $article->id }}</td>
                                    <td class="border px-2 py-2">{{ $article->user->name }}</td>
                                    <td class="border px-2 py-2">
                                        @if ($article->getFirstMediaUrl('images_url', 'small'))
                                            <img width="100" height="100" src="{{ asset($article->getFirstMediaUrl('images_url', 'small')) }}" alt="{{ $article->title }}">
                                        @endif
                                    </td>
                                    <td class="border px-2 py-2">{{ $article->title }}</td>
                                    <td class="border px-2 py-2">
                                        {{ substr($article->content, 0, 300) . ' ...' }}
                                    </td>
                                    <td class="border px-2 py-2">{{ $article->created_at }}</td>
                                    <td class="border px-2 py-2">{{ $article->updated_at }}</td>
                                    <td class="border px-2 py-2">
                                        <div class="flex justify-center items-center {{ $own_articles->contains($article) ? '' : 'pointer-events-none'}}">
                                            <div class="inline-block mx-1 p-1 rounded {{ $own_articles->contains($article) ? 'bg-green-500 hover:bg-green-800' : 'bg-gray-300'}}">
                                                <a class="flex items-center" href="{{ route('backend_article.edit', $article->id) }}">
                                                    <span class="inline-block">
                                                        <x-edit-icon class="h-4 w-4 text-white" />
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inline-block mx-1 p-1 rounded {{ $own_articles->contains($article) ? 'bg-red-500 hover:bg-red-800' : 'bg-gray-300'}}">
                                                <form action="{{ route('backend_article.destroy', $article->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="flex items-center confirmation-delete" type="submit">
                                                        <span class="inline-block">
                                                            <x-delete-icon class="h-4 w-4 text-white" />
                                                        </span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <p class="text-lg text-red-500 mb-4">
                                    {{ __('No data yet') }}
                                </p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- Paging Bar -->
                <div class="pt-4">
                    {{ $articles->onEachSide(1)->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
    </div>
</x-backend_app-layout>
