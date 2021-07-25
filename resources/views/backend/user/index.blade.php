<x-backend_app-layout>
    <x-slot name="title">
        Users
    </x-slot>
    
    <!-- Header + Create new -->
    <div class="mb-8 flex items-center">
        <div class="p-4 text-3xl mr-auto">
            User table
        </div>
        <a class="flex items-center mr-4 p-2 bg-green-500 hover:bg-green-900 rounded" href="{{ route('backend_user.create') }}">
            <span class="inline-block">
                <x-add-icon class="h-4 w-4 text-white" />
            </span>
            <span class="text-sm pl-1 text-white">Create New</span>
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
                                <th class="border px-2 py-2">ID</th>
                                <th class="border px-2 py-2">Name</th>
                                <th class="border px-2 py-2">Email</th>
                                <th class="border px-2 py-2">Email verified at</th>
                                <th class="border px-2 py-2">Created at</th>
                                <th class="border px-2 py-2">Updated at</th>
                                <th class="border px-2 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="border px-2 py-2">{{ $user->id }}</td>
                                    <td class="border px-2 py-2">{{ $user->name }}</td>
                                    <td class="border px-2 py-2">{{ $user->email }}</td>
                                    <td class="border px-2 py-2">{{ $user->email_verified_at }}</td>
                                    <td class="border px-2 py-2">{{ $user->created_at }}</td>
                                    <td class="border px-2 py-2">{{ $user->updated_at }}</td>
                                    <td class="border px-2 py-2">
                                        <div class="flex justify-center items-center">
                                            <div class="inline-block">
                                                <a class="flex items-center" href="{{ route('backend_user.edit', $user->id) }}">
                                                    <span class="inline-block">
                                                        <x-edit-icon class="h-5 w-5 text-green-500 hover:text-gray-800" />
                                                    </span>
                                                    <span class="text-xs pl-1">Edit</span>
                                                </a>
                                            </div>
                                            <div class="inline-block mx-3 h-5 w-px bg-gray-500"></div>
                                            <!-- Prevent delete user use pointer-events-none-->
                                            <div class="inline-block pointer-events-none text-gray-300">
                                                <form action="{{ route('backend_user.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="flex items-center" type="submit">
                                                        <span class="inline-block">
                                                            <!--Enable text-red-500 hover:text-gray-800 -->
                                                            <x-delete-icon class="h-5 w-5 text-gray-300" />
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
                
                <!-- Paging Bar -->
                <div class="pt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-backend_app-layout>
