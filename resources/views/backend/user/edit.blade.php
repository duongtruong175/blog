<x-backend_app-layout>
    <x-slot name="title">
        Users
    </x-slot>

    <!-- Form sửa -->
    <div class="p-4 text-3xl mr-auto">
        Edit user
    </div>
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white sm:rounded-lg">
        <form method="POST" action="{{ route('backend_user.update', $user->id) }}">
            @csrf
            @method('PUT')

            <!-- ID -->
            <div>
                <label for="id" class="block font-medium text-sm text-gray-700">ID</label>
                <input class="block mt-1 w-full rounded-md shadow-sm bg-gray-300 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" id="id" name="id" value="{{ $user->id }}" required readonly />
            </div>

            <!-- Name -->
            <div class="mt-4">
                <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                <input class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" id="name" name="name" value="{{ $user->name }}" required autofocus onfocus="this.selectionStart = this.value.length;" />
            </div>

            <div class="mt-8 flex-row">
                <button class="ml-3 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit">
                    Update
                </button>
                <a href="{{ url()->previous() }}" class="ml-3 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150" >
                    Cancel
                </a>
            </div>
        </form>
    </div>

</x-backend_app-layout>