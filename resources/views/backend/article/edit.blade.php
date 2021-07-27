<x-backend_app-layout>
    <x-slot name="title">
        {{ __('Edit article') }}
    </x-slot>

    <!-- Form edit -->
    <div class="p-4 text-3xl mr-auto">
        {{ __('Edit article') }}
    </div>
    <div class="w-full sm:max-w-4xl mt-6 px-6 py-4 bg-white sm:rounded-lg">
        <form method="POST" action="{{ route('backend_article.update', $article->id) }}">
            @csrf
            @method('PUT')

            <!-- ID -->
            <div>
                <label for="id" class="block font-medium text-sm text-gray-700">{{ __('ID') }}</label>
                <input class="block mt-1 w-full rounded-md shadow-sm bg-gray-300 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" id="id" name="id" value="{{ $article->id }}" required readonly />
            </div>

            <!-- Title -->
            <div class="mt-4">
                <label for="title" class="block font-medium text-sm text-gray-700">{{ __('Title') }}</label>
                <input class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" id="title" name="title" value="{{ old('title') ? old('title') : $article->title }}" required autofocus onfocus="this.selectionStart = this.value.length;" />
                @error('title')
                    <div class="text-xs text-red-900 py-1 px-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Content -->
            <div class="mt-4">
                <label for="content" class="block font-medium text-sm text-gray-700">{{ __('Content') }}</label>
                <textarea rows="10" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="content" name="content" required >{{ old('content') ? old('content') : $article->content }}</textarea>
                @error('content')
                    <div class="text-xs text-red-900 py-1 px-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-8 flex-row">
                <button class="ml-3 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit">
                    {{ __('Update') }}
                </button>
                <a href="{{ url()->previous() }}" class="ml-3 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150" >
                    {{ __('Cancel') }}
                </a>
            </div>
        </form>
    </div>

</x-backend_app-layout>
