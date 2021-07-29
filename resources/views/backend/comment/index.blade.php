<x-backend_app-layout>
    <x-slot name="title">
        {{ __('Comment list') }}
    </x-slot>
    
    <!-- Header -->
    <div class="mb-8 flex items-center">
        <div class="p-4 text-3xl mr-auto">
            {{ __('Comment list') }}
        </div>
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
                                <th class="border px-2 py-2">{{ __('Article title') }}</th>
                                <th class="border px-2 py-2">{{ __('User created') }}</th>
                                <th class="border px-2 py-2">{{ __('Content') }}</th>
                                <th class="border px-2 py-2">{{ __('Created at') }}</th>
                                <th class="border px-2 py-2">{{ __('Updated at') }}</th>
                                <th class="border px-2 py-2">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($comments as $comment)
                                <tr>
                                    <td class="border px-2 py-2">{{ $comment->id }}</td>
                                    <td class="border px-2 py-2">{{ $comment->article->title }}</td>
                                    <td class="border px-2 py-2">{{ $comment->user->name }}</td>
                                    <td class="border px-2 py-2">{{ $comment->content }}</td>
                                    <td class="border px-2 py-2">{{ $comment->created_at }}</td>
                                    <td class="border px-2 py-2">{{ $comment->updated_at }}</td>
                                    <td class="border px-2 py-2">
                                        <div class="flex justify-center items-center">
                                            <div class="inline-block mx-1 p-1 rounded bg-red-500 hover:bg-red-800">
                                                <form action="{{ route('backend_comment.destroy', $comment->id) }}" method="POST">
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
                    {{ $comments->onEachSide(1)->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
    </div>
</x-backend_app-layout>
