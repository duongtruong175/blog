<x-app-layout>
    <x-slot name="title">
        Article detail
    </x-slot>

    <div class="mx-8 px-2 py-4 lg:flex">
        <!-- Content Left -->
        <div class="w-full lg:w-3/4">
            <div class="py-8">
                <div class="container px-24 mx-auto">
                    <!-- Article detail -->
                    <div class="bg-white">
                        <div class="text-2xl font-bold p-4 bg-gray-100">
                            {{ $article->title }}
                        </div>
                        <div class="w-full">
                            <div class="pt-12 pl-4 pb-4">
                                <img width="200" height="200" src="https://vantien.net/wp-content/uploads/2019/01/5826817b0ad24b8126df6762b54ae1b7.png" alt="What is Laravel">
                            </div>
                        </div>
                        <div class="w-full p-4 text-base">
                            <div class="mt-4 flex items-center text-center">
                                <div class="font-bold">
                                    <p>Author:</p>
                                </div>
                                <div class="ml-2">
                                    <p>{{ $article->user->name }}</p>
                                </div>
                            </div>
                            <div class="mt-4 flex items-center text-center">
                                <div class="font-bold">
                                    <p>Categories:</p>
                                </div>
                                <div class="ml-2">
                                    <p>{!! $article->getCategoriesLinksAttribute() !!}</p>
                                </div>
                            </div>
                            <div class="mt-4 flex items-center text-center">
                                <div class="font-bold">
                                    <p>Tags:</p>
                                </div>
                                <div class="ml-2">
                                    <p>{!! $article->getTagsLinksAttribute() !!}</p>
                                </div>
                            </div>
                            <div class="my-4">
                                <p>
                                    {!! nl2br($article->content) !!}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Comment Container -->
                    <div class="bg-white">
                        <!-- Input comment -->
                        <div class="mt-12">
                            <div class="font-bold text-3xl mb-6">
                                Comments
                            </div>
                            <div class="mb-6 pt-2">
                                @auth
                                    <form id="form-add-comment">
                                        @csrf
                            
                                        <!-- Article ID -->
                                        <input type="hidden" id="article_id" name="article_id" value="{{ $article->id }}" required />
                                        
                                        <!-- User ID -->
                                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::id() }}" required />
        
                                        <!-- Content -->
                                        <div class="relative w-full clear-both">
                                            <textarea class="py-4 pl-4 pr-20 sm:pr-28 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" style="min-height: 6.725rem" id="content" name="content" required placeholder="Enter a content comment">{{ old('content') }}</textarea>
                                            <button type="submit" id="btn-add-comment" class="w-8 h-8 absolute border-none top-10 right-10 bg-cover" style="background-image: url('{{ asset('img/comment_textarea.png') }}'); background-color: inherit;"></button>
                                        </div>
                            
                                    </form>
                                    <div class="text-xs text-red-900">
                                        <ul id="ul-errors">
                                        </ul>
                                    </div>
                                @else
                                    <div class="w-full">
                                        <div class="border rounded p-2 flex">
                                            <a class="mx-auto text-center flex" href="{{ route('login') }}">
                                                <x-login-icon class="w-6 h-6 text-gray-500" />
                                                <span class="text-sm ml-2">Login to comment!</span>
                                            </a>
                                        </div>
                                    </div>
                                @endauth
                            </div>
                        </div>
                        <!-- List comments -->
                        <div id="ul-comments" class="mt-6">
                            @forelse ($article->comments as $comment)
                                <div class="mt-4 flex w-full">
                                    <div class="mr-2 pt-2 pl-2">
                                        <img class="w-8 h-8 rounded-full object-cover object-right" src="http://trichdanhay.vn/wp-content/uploads/2020/09/nhung-cau-noi-hay-cua-huan-hoa-hong.png" alt="">
                                    </div>
                                    <div class="mx-2 bg-gray-100 w-full p-4 rounded">
                                        <div class="text-sm">
                                            <span class="font-bold">{{ $comment->user->name }}</span>
                                            <!-- Display xx minutes/hours/days/months/years ago-->
                                            <span class="ml-8 text-gray-400">{{ $comment->time_elapsed_string($comment->created_at) }}</span>
                                        </div>
                                        <div class="pt-4">
                                            {{ $comment->content }}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div id="ul-comments-empty" class="mt-4 w-full">
                                    <div class="border rounded p-2 flex">
                                        <div class="mx-auto text-center flex">
                                            <x-comment-icon class="w-6 h-6 text-gray-500" />
                                            <span class="text-sm ml-2">No comments yet.</span>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nav Right -->
        <div class="hidden lg:block lg:w-1/4 z-100">
            <!-- Table of contents -->
            <div class="py-8 mx-3">
                <div class="shadow text-xl font-bold p-4 bg-gray-100">
                    Table of contents
                </div>
                <div class="pl-8 py-4">
                    <ul>
                        <li>Page 1</li>
                        <li>Page 2</li>
                        <li>Page 3</li>
                        <li>Page 4</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
