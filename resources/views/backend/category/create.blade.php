<x-backend_app-layout>
    <x-slot name="title">
        Categories
    </x-slot>

    <!-- Form thêm mới -->
    <div class="p-4 text-3xl mr-auto">
        Add new category 
    </div>
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white sm:rounded-lg">
        <form method="POST" action="{{ route('backend_category.store') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block font-medium text-sm text-gray-700">Name</label>

                <input class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" id="name" name="name" required autofocus />
            </div>

            <div class="mt-4 flex-row">
                <x-button class="ml-3 bg-blue-500" type="submit">
                    Add
                </x-button>
                <a href="{{ url()->previous() }}" class="ml-3 bg-blue-500 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" >
                    Cancel
                </a>
            </div>
        </form>
    </div>

</x-backend_app-layout>