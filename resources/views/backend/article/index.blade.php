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
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
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
                                    <td class="border px-2 py-2">{{ $article->title }}</td>
                                    <td class="border px-2 py-2">
                                        {{ strlen($article->content) > 300 ? substr($article->content, 0, 300) . ' ...' :  $article->content }}
                                    </td>
                                    <td class="border px-2 py-2">{{ $article->created_at }}</td>
                                    <td class="border px-2 py-2">{{ $article->updated_at }}</td>
                                    <td class="border px-2 py-2">
                                        <div class="flex justify-center items-center {{ $own_articles->contains($article) ? '' : 'pointer-events-none text-gray-300'}}">
                                            <div class="inline-block mx-1">
                                                <a class="flex items-center" href="{{ route('backend_article.edit', $article->id) }}">
                                                    <span class="inline-block">
                                                        <x-edit-icon class="h-5 w-5 {{ $own_articles->contains($article) ? 'text-green-500 hover:text-gray-800' : 'text-gray-300'}}" />
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inline-block mx-1">
                                                <form action="{{ route('backend_article.destroy', $article->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="flex items-center" type="submit">
                                                        <span class="inline-block">
                                                            <x-delete-icon class="h-5 w-5 {{ $own_articles->contains($article) ? 'text-red-500 hover:text-gray-800' : 'text-gray-300'}}" />
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
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</x-backend_app-layout>
