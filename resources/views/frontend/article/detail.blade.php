<x-app-layout>
    <x-slot name="title">
        {{ __('Article detail') }}
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
                            <div class="py-4 flex items-center">
                                @if ($article->getFirstMediaUrl('images_url', 'large'))
                                    <img class="mx-auto" width="400" height="200" src="{{ asset($article->getFirstMediaUrl('images_url', 'large')) }}" alt="{{ $article->title }}">
                                @endif
                            </div>
                        </div>
                        <div class="w-full p-4 text-base">
                            <div class="mt-4 flex items-center text-center">
                                <div class="font-bold">
                                    <p>{{ __('Author') }}:</p>
                                </div>
                                <div class="ml-2">
                                    <p>{{ $article->user->name }}</p>
                                </div>
                            </div>
                            <div class="mt-4 flex items-center text-center">
                                <div class="font-bold">
                                    <p>{{ __('Categories') }}:</p>
                                </div>
                                <div class="ml-2">
                                    <p>{!! $article->getCategoriesLinksAttribute() !!}</p>
                                </div>
                            </div>
                            <div class="mt-4 flex items-center text-center">
                                <div class="font-bold">
                                    <p>{{ __('Tags') }}:</p>
                                </div>
                                <div class="ml-2">
                                    <p>{!! $article->getTagsLinksAttribute() !!}</p>
                                </div>
                            </div>
                            <div class="mt-4 flex items-center text-center">
                                <div class="mx-auto bg-yellow-100 rounded flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-yellow-500 p-2 text-sm">{{ __('This article was updated at') . ' ' . $article->updated_at }}</p>
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
                                {{ __('Comments') }}
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
                                            <textarea class="py-4 pl-4 pr-20 sm:pr-28 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" style="min-height: 6.725rem" id="content" name="content" required placeholder="{{ __('Enter a content comment') }}">{{ old('content') }}</textarea>
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
                                                <span class="text-sm ml-2">{{ __('Login to comment') }}!</span>
                                            </a>
                                        </div>
                                    </div>
                                @endauth
                            </div>
                        </div>
                        <!-- List comments -->
                        <div id="ul-comments" class="mt-6">
                            @forelse ($comments as $comment)
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
                                            <span class="text-sm ml-2">{{ __('No comments yet') }}</span>
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
                <div class="text-xl font-bold p-4 border-b">
                    {{ __("Table of contents") }}
                </div>
                <div class="py-4">
                    <ul class="bg-gray-100 p-2">
                        <p>{{ __('There is no table of contents') }}</p>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
