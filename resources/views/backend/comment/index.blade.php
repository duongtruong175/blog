<x-backend_app-layout>
    <x-slot name="title">
        Comments
    </x-slot>
    
    <!-- Header + Thêm mới -->
    <div class="mb-8 flex items-center">
        <div class="p-4 text-3xl mr-auto">
            Comment table
        </div>
    </div>
    <div class="shadow mx-0">
        <div class="py-8">
            <div class="container px-4 mx-auto">
                <!-- Dữ liệu bảng -->
                <div class="px-8 py-5">
                    <table class="table-auto w-full text-center">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">Article Title</th>
                                <th class="border px-4 py-2">User Created</th>
                                <th class="border px-4 py-2">Content</th>
                                <th class="border px-4 py-2">Created At</th>
                                <th class="border px-4 py-2">Updated At</th>
                                <th class="border px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($comments as $comment)
                                <tr>
                                    <td class="border px-4 py-2">{{ $comment->id }}</td>
                                    <td class="border px-4 py-2">{{ $comment->article_id }}</td>
                                    <td class="border px-4 py-2">{{ $comment->user_id }}</td>
                                    <td class="border px-4 py-2">{{ $comment->content }}</td>
                                    <td class="border px-4 py-2">{{ $comment->created_at }}</td>
                                    <td class="border px-4 py-2">{{ $comment->updated_at }}</td>
                                    <td class="border px-4 py-2">
                                        <div class="flex justify-center items-center">
                                            <div class="inline-block">
                                                <form action="{{ route('backend_comment.destroy', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="flex items-center" type="submit">
                                                        <span class="inline-block">
                                                            <x-delete-icon class="h-5 w-5 text-red-500 hover:text-gray-800" />
                                                        </span>
                                                        <span class="text-xs pl-1">Delete</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <p class="text-lg text-red-500 mb-4">
                                    Dữ liệu trống
                                </p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- Thanh chia dữ liệu bảng -->
                <div class="flex flex-wrap justify-between pt-6">
                    <div class="w-full lg:w-auto mb-4 lg:mb-0 flex items-center">
                        <p class="mr-3 text-xs text-gray-400">Show</p>
                        <div class="flex bg-white border border-gray-100 rounded">
                            <select class="text-xs border-0 w-full text-gray-500" name="" id="">
                                <option value="1">10</option>
                                <option value="2">20</option>
                                <option value="3">50</option>
                            </select>
                        </div>
                        <p class="text-xs ml-3 text-gray-400">of 1200</p>
                    </div>
                    <div class="w-full lg:w-auto flex items-center justify-center">
                        <a class="inline-flex mr-3 items-center justify-center w-8 h-8 text-xs text-gray-500 border border-gray-300 bg-white hover:bg-indigo-50 rounded" href="#">
                            <x-arrow-left-icon width="6" height="8" />
                        </a>
                        <x-link-page-number :href="'#'" :active="$comments">
                            1
                        </x-link-page-number>
                        <x-link-page-number :href="'#'" :active="[]">
                            2
                        </x-link-page-number>
                        <span class="inline-block mr-3">
                            <x-etc-icon class="h-3 w-3 text-gray-200" />
                        </span>
                        <x-link-page-number :href="'#'" :active="[]">
                            5
                        </x-link-page-number>
                        <x-link-page-number :href="'#'" :active="[]">
                            6
                        </x-link-page-number>
                        <span class="inline-block mr-3">
                            <x-etc-icon class="h-3 w-3 text-gray-200" />
                        </span>
                        <x-link-page-number :href="'#'" :active="[]">
                            8
                        </x-link-page-number>
                        <a class="inline-flex items-center justify-center w-8 h-8 text-xs text-gray-500 border border-gray-300 bg-white hover:bg-indigo-50 rounded" href="#">
                            <x-arrow-right-icon width="6" height="8" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-backend_app-layout>