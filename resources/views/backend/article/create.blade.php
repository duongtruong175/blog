<x-backend_app-layout>
    <x-slot name="title">
        {{ __('Add article') }}
    </x-slot>

    <!-- Form Create new -->
    <div class="p-4 text-3xl mr-auto">
        {{ __('Add new article') }}
    </div>
    <div class="w-full sm:max-w-4xl mt-6 px-6 py-4 bg-white sm:rounded-lg">
        <form method="POST" action="{{ route('backend_article.store') }}">
            @csrf

            <!-- Title -->
            <div>
                <label for="title" class="block font-medium text-sm text-gray-700">{{ __('Title') }}</label>
                <input class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" id="title" name="title" value="{{ old('title') }}" required autofocus />
                @error('title')
                    <div class="text-xs text-red-900 py-1 px-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Content -->
            <div class="mt-4">
                <label for="content" class="block font-medium text-sm text-gray-700">{{ __('Content') }}</label>
                <textarea rows="10" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" style="min-height: 6.725rem" id="content" name="content" required >{{ old('content') }}</textarea>
                @error('content')
                    <div class="text-xs text-red-900 py-1 px-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Categories -->
            <fieldset class="mt-4">
                <legend for="categories" class="block font-medium text-sm text-gray-700">{{ __('Categories') . ' (' . __('Max :number categories', ['number' => 3]) . ')' }}</legend>
                <div class="mt-1 w-full overscroll-y-auto overflow-auto h-40">
                    @foreach ($categories as $category)
                        <div class="flex items-center my-2 ml-2 text-sm">
                            <input class="rounded" type="checkbox" id="category_{{ $category->id }}" name="categories[]" value="{{ $category->id }}" />
                            <label class="pl-2" for="category_{{ $category->id }}">{{ $category->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('categories')
                    <div class="text-xs text-red-900 py-1 px-2">{{ __($message) }}</div>
                @enderror
            </fieldset>

            <!-- Tags -->
            <div class="mt-4">
                <label for="tags" class="block font-medium text-sm text-gray-700">{{ __('Tags') . ' (' . __('Comma-separated values') . ')' }}</label>
                <input class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" id="tags" name="tags" value="{{ old('tags') }}" />
                @error('tags')
                    <div class="text-xs text-red-900 py-1 px-2">{{ __($message) }}</div>
                @enderror
            </div>

            <div class="mt-8 flex-row">
                <button class="ml-3 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit">
                    {{ __('Add') }}
                </button>
                <a href="{{ url()->previous() }}" class="ml-3 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150" >
                    {{ __('Cancel') }}
                </a>
            </div>
        </form>
    </div>

</x-backend_app-layout>
