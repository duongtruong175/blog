<x-backend_app-layout>
    <x-slot name="title">
        {{ __('Tag list') }}
    </x-slot>
    
    <!-- Header + Create new -->
    <div class="mb-8 flex items-center">
        <div class="p-4 text-3xl mr-auto">
            {{ __('Tag list') }}
        </div>
        <a class="flex items-center mr-4 p-2 bg-green-500 hover:bg-green-900 rounded" href="{{ route('backend_tag.create') }}">
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
                                <option value="5" {{ request('length') == 5 ? 'selected' : '' }}>5</option>
                                <option value="10" {{ request('length') == 10 ? 'selected' : '' }}>10</option>
                                <option value="20" {{ request('length') == 20 ? 'selected' : '' }}>20</option>
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
                                <th class="border px-2 py-2">{{ __('Name') }}</th>
                                <th class="border px-2 py-2">{{ __('Created at') }}</th>
                                <th class="border px-2 py-2">{{ __('Updated at') }}</th>
                                <th class="border px-2 py-2">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tags as $tag)
                                <tr>
                                    <td class="border px-2 py-2">{{ $tag->id }}</td>
                                    <td class="border px-2 py-2">{{ $tag->name }}</td>
                                    <td class="border px-2 py-2">{{ $tag->created_at }}</td>
                                    <td class="border px-2 py-2">{{ $tag->updated_at }}</td>
                                    <td class="border px-2 py-2">
                                        <div class="flex justify-center items-center">
                                            <div class="inline-block mx-1">
                                                <a class="flex items-center" href="{{ route('backend_tag.edit', $tag->id) }}">
                                                    <span class="inline-block">
                                                        <x-edit-icon class="h-5 w-5 text-green-500 hover:text-gray-800" />
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="inline-block mx-1">
                                                <form action="{{ route('backend_tag.destroy', $tag->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="flex items-center confirmation-delete" type="submit">
                                                        <span class="inline-block">
                                                            <x-delete-icon class="h-5 w-5 text-red-500 hover:text-gray-800" />
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
                    {{ $tags->onEachSide(1)->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
    </div>
</x-backend_app-layout>
