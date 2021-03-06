<x-app-layout>
    <x-slot name="title">
        {{ __('Article list') }}
    </x-slot>

    <div class="mx-4 px-2 py-4 lg:flex">
        <!-- Content Left -->
        <div class="w-full lg:w-3/4">
            <div class="py-8">
                <div class="container px-4 mx-auto">
                    <div class="flex flex-wrap m-4">
                        <!-- List Articles -->
                        @forelse($articles as $article)
                            <div class="w-full lg:w-2/4 p-4">
                                <div class="bg-white shadow rounded overflow-hidden sm:flex">
                                    <div class="w-full sm:w-4/12 flex">
                                        <div class="p-2 m-auto">
                                            @if ($article->getFirstMediaUrl('images_url', 'thumb'))
                                                <img width="200" height="200" src="{{ asset($article->getFirstMediaUrl('images_url', 'thumb')) }}" alt="{{ $article->title }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="w-full px-4 sm:w-8/12 sm:px-2 py-4">
                                        <div class="mt-4 border-b">
                                            <a class="text-2xl text-blue-500 hover:text-blue-800" href="{{ route('articles.show', $article->id) }}">
                                                {{ $article->title }}
                                            </a>
                                        </div>
                                        <div class="text-sm mt-4 flex items-center text-center">
                                            <div class="font-bold">
                                                <p>{{ __('Author') }}:</p>
                                            </div>
                                            <div class="ml-2">
                                                <div class="overflow-hidden whitespace-nowrap">{{ $article->user->name }}</div>
                                            </div>
                                        </div>
                                        <div class="text-sm mt-4 flex items-center text-center">
                                            <div class="font-bold">
                                                <p>{{ __('Categories') }}:</p>
                                            </div>
                                            <div class="ml-2">
                                                <div class="overflow-hidden whitespace-nowrap">{!! $article->getCategoriesLinksAttribute() !!}</div>
                                            </div>
                                        </div>
                                        <div class="text-sm mt-4 flex items-center text-center">
                                            <div class="font-bold">
                                                <p>{{ __('Tags') }}:</p>
                                            </div>
                                            <div class="ml-2">
                                                <div class="overflow-hidden whitespace-nowrap">{!! $article->getTagsLinksAttribute() !!}</div>
                                            </div>
                                        </div>
                                        <div class="text-sm mt-4 flex items-center text-center text-gray-500">
                                            <x-comment-icon width="20" height="20"/>
                                            <span class="ml-1">
                                                {{ count($article->comments) }}
                                            </span>
                                        </div>
                                        <div class="text-sm my-4">
                                            <p>
                                                <p class="overflow-hidden" style="max-height: 9rem; min-height: 9rem">{{ substr($article->content, 0, 399) . ' ...' }}</p>
                                                <a class="text-blue-500 hover:text-blue-800" href="{{ route('articles.show', $article->id) }}">
                                                    {{ __('Read full article') }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-xl pl-56 pt-8">
                                {{ __('No articles yet') }}
                            </div>
                        @endforelse
                    </div>

                    @if($articles->isNotEmpty())
                        <!-- Paging Bar -->
                        <div class="pt-4">
                            {{ $articles->onEachSide(1)->appends(request()->except('page'))->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Nav Right -->
        <div class="w-full lg:w-1/4">
            <div class="py-8 mx-3">
                <div class="shadow">
                    <div class="text-xl font-bold p-4 bg-gray-100">
                        {{ __('Search by keyword') }}
                    </div>
                    <div class="pl-4 py-4">
                        <form action="{{ route('articles.index') }}" method="GET">
                            <input class="text-xs w-7/12 p-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" id="keyword" name="keyword" placeholder="{{ __('Enter a keyword') }}" value="{{ request('keyword') }}" required />
                            <button class="text-xs ml-2 text-white p-2 bg-blue-500 hover:bg-blue-800 rounded">{{ __('Search') }}</button>
                        </form>
                    </div>
                </div>
                <div class="shadow mt-6">
                    <div class="text-xl font-bold p-4 bg-gray-100">
                        {{ __('Categories') }}
                    </div>
                    <div class="text-sm h-64 overscroll-y-auto overflow-y-auto overflow-x-hidden">
                        <ul class="pl-10 pt-3 pb-6">
                            @forelse($categories as $category)
                                <li class="pt-3">
                                    <div class="inline-block transition duration-300 transform text-blue-500 hover:scale-110" >
                                        <a href="{{ route('articles.index') . '?category_id=' . $category->id }}">
                                            {{ $category->name }}
                                        </a>
                                    </div>
                                </li>
                            @empty
                                <li class="pt-3">
                                    {{ __('No categories yet') }}
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="shadow mt-6">
                    <div class="text-xl font-bold p-4 bg-gray-100">
                        {{ __('Top :number tags', ['number' => 5]) }}
                    </div>
                    <div class="text-sm">
                        <ul class="pl-10 pt-3 pb-6">
                            @forelse($top_tags as $tag)
                                <li class="pt-3">
                                    <div class="inline-block transition duration-300 transform text-blue-500 hover:scale-110" >
                                        <a href="{{ route('articles.index') . '?tag_id=' . $tag->id }}">
                                            {{ $tag->name }}
                                        </a>
                                    </div>
                                </li>
                            @empty
                                <li class="pt-3">
                                    {{ __('No tags yet') }}
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
