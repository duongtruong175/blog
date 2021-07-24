<x-backend_app-layout>
    <x-slot name="title">
        Roles
    </x-slot>
    
    <!-- Header + Create new -->
    <div class="mb-8 flex items-center">
        <div class="p-4 text-3xl mr-auto">
            Role table
        </div>
        <a class="flex items-center mr-4 p-2 bg-green-500 hover:bg-green-900 rounded" href="{{ route('backend_role.create') }}">
            <span class="inline-block">
                <x-add-icon class="h-4 w-4 text-white" />
            </span>
            <span class="text-sm pl-1 text-white">Create New</span>
        </a>
    </div>
    <div class="shadow mx-0">
        <div class="py-8">
            <div class="container px-4 mx-auto">
                <!-- Data table -->
                <div class="px-4 py-4 overflow-x-auto">
                    <table class="table-auto w-full text-center text-sm">
                        <thead>
                            <tr>
                                <th class="border px-2 py-2">ID</th>
                                <th class="border px-2 py-2">Name</th>
                                <th class="border px-2 py-2">Created at</th>
                                <th class="border px-2 py-2">Updated at</th>
                                <th class="border px-2 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                                <tr>
                                    <td class="border px-2 py-2">{{ $role->id }}</td>
                                    <td class="border px-2 py-2">{{ $role->name }}</td>
                                    <td class="border px-2 py-2">{{ $role->created_at }}</td>
                                    <td class="border px-2 py-2">{{ $role->updated_at }}</td>
                                    <td class="border px-2 py-2">
                                        <div class="flex justify-center items-center {{ $role->name === 'admin' ? 'pointer-events-none text-gray-300' : ''}}">
                                            <div class="inline-block">
                                                <a class="flex items-center" href="{{ route('backend_role.edit', $role->id) }}">
                                                    <span class="inline-block">
                                                        <x-edit-icon class="h-5 w-5 {{ $role->name === 'admin' ? 'text-gray-300' : 'text-green-500 hover:text-gray-800'}}" />
                                                    </span>
                                                    <span class="text-xs pl-1">Edit</span>
                                                </a>
                                            </div>
                                            <div class="inline-block mx-3 h-5 w-px {{ $role->name === 'admin' ? 'bg-gray-300' : 'bg-gray-500'}}"></div>
                                            <div class="inline-block">
                                                <form action="{{ route('backend_role.destroy', $role->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="flex items-center" type="submit">
                                                        <span class="inline-block">
                                                            <x-delete-icon class="h-5 w-5 {{ $role->name === 'admin' ? 'text-gray-300' : 'text-red-500 hover:text-gray-800'}}" />
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
                        <x-link-page-number :href="'#'" :active="$roles">
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
