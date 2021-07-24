<x-app-layout>
    <x-slot name="title">
        Articles
    </x-slot>

    <div class="mx-4 px-2 py-4 lg:flex">
        <!-- Content Left -->
        <div class="w-full lg:w-3/4">
            <div class="py-8">
                <div class="container px-4 mx-auto">
                    <div class="flex flex-wrap -m-4">
                        <!-- List Articles -->
                        @forelse($articles as $article)
                            <div class="w-full lg:w-2/4 p-4">
                                <div class="bg-white shadow rounded overflow-hidden sm:flex">
                                    <div class="w-full sm:w-4/12 flex">
                                        <div class="p-2 m-auto">
                                            <img width="200" height="200" src="https://vantien.net/wp-content/uploads/2019/01/5826817b0ad24b8126df6762b54ae1b7.png" alt="{{ $article->title }}">
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
                                                <p>Author:</p>
                                            </div>
                                            <div class="ml-2">
                                                <p>{{ $article->user->name }}</p>
                                            </div>
                                        </div>
                                        <div class="text-sm mt-4 flex items-center text-center">
                                            <div class="font-bold">
                                                <p>Categories:</p>
                                            </div>
                                            <div class="ml-2">
                                                <p>{!! $article->getCategoriesLinksAttribute() !!}</p>
                                            </div>
                                        </div>
                                        <div class="text-sm mt-4 flex items-center text-center">
                                            <div class="font-bold">
                                                <p>Tags:</p>
                                            </div>
                                            <div class="ml-2">
                                                <p>{!! $article->getTagsLinksAttribute() !!}</p>
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
                                                {{ strlen($article->content) > 400 ? substr($article->content, 0, 400) . ' ...' : $article->content }}
                                                <a class="text-blue-500 hover:text-blue-800" href="{{ route('articles.show', $article->id) }}">
                                                    Read full article
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-xl pl-56 pt-8">
                                No articles yet.
                            </div>
                        @endforelse
                    </div>

                    @if(!empty($articles))
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
                                <x-link-page-number :href="'#'" :active="[1]">
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
                    @endif
                </div>
            </div>
        </div>

        <!-- Nav Right -->
        <div class="w-full lg:w-1/4">
            <div class="py-8 mx-3">
                <div class="shadow">
                    <div class="text-xl font-bold p-4 bg-gray-100">
                        Search by keyword
                    </div>
                    <div class="pl-4 py-4">
                        <form action="#" method="GET">
                            <input class="text-xs w-7/12 p-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" id="keyword" name="keyword" placeholder="Enter a keyword" required />
                            <button class="text-xs ml-2 text-white p-2 bg-blue-500 hover:bg-blue-800 rounded">Search</button>
                        </form>
                    </div>
                </div>
                <div class="shadow mt-6">
                    <div class="text-xl font-bold p-4 bg-gray-100">
                        Categories
                    </div>
                    <div class="text-sm">
                        <ul class="pl-10 pt-3 pb-6">
                            @forelse($categories as $category)
                                <li class="pt-3">
                                    <div class="transition duration-300 transform text-blue-500 hover:text-blue-900 hover:scale-105" >
                                        <a href="#">
                                            {{ $category->name }}
                                        </a>
                                    </div>
                                </li>
                            @empty
                                <li class="pt-3">
                                    No categories yet.
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="shadow mt-6">
                    <div class="text-xl font-bold p-4 bg-gray-100">
                        Top 5 tags
                    </div>
                    <div class="text-sm">
                        <ul class="pl-10 pt-3 pb-6">
                            @forelse($top_tags as $tag)
                                <li class="pt-3">
                                    <div class="transition duration-300 transform text-blue-500 hover:text-blue-800 hover:scale-105" >
                                        <a href="#">
                                            {{ $tag->name }}
                                        </a>
                                    </div>
                                </li>
                            @empty
                                <li class="pt-3">
                                    No tags yet.
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
