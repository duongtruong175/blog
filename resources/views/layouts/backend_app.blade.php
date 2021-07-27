<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ? __('Admin') . ' | ' . $title : __('Admin Blog') }}</title>

        @include('layouts.backend_header')
    </head>
    <body>
        <div class="min-h-screen">
            <!-- Responsive Left Navigation-->
            <nav class="lg:hidden py-6 px-6 border-b">
                <div class="flex items-center justify-between">
                    <div class="flex">
                        <a class="text-2xl font-semibold" href="{{ route('backend.home') }}">
                            <x-application-logo class="block h-8 w-auto fill-current text-gray-600" />
                        </a>
                        <span class="ml-2 font-medium text-2xl">{{ __('Admin Blog') }}</span>
                    </div>
                    <button class="navbar-burger flex items-center rounded focus:outline-none">
                        <svg class="text-white bg-indigo-500 hover:bg-indigo-600 block h-8 w-8 p-2 rounded" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                        </svg>
                    </button>
                </div>
            </nav>

            <!-- Left Navigation -->
            <div class="hidden lg:block navbar-menu relative z-50">
                <div class="navbar-backdrop fixed lg:hidden inset-0 bg-gray-800 opacity-10"></div>
                <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-2/4 lg:w-56 sm:w-56 pt-6 pb-8 bg-white border-r overflow-y-auto">
                    <div class="flex w-full items-center px-6 pb-6 mb-6 lg:border-b">
                        <div class="flex">
                            <a class="text-xl font-semibold" href="{{ route('backend.home') }}">
                                <x-application-logo class="block h-8 w-auto fill-current text-gray-600" />
                            </a>
                            <span class="ml-2 font-medium text-2xl">{{ __('Admin Blog') }}</span>
                        </div>
                    </div>
                    <div class="px-4 pb-6">
                        <h3 class="mb-2 text-xs uppercase text-gray-500 font-medium">{{ __('Resource') }}</h3>
                        <ul class="mb-8 text-sm font-medium">
                            <li>
                                <a class="flex items-center pl-3 py-3 pr-4 {{ request()->routeIs('backend_dashboard.*') ? 'text-white bg-indigo-500' : 'text-gray-500 hover:bg-indigo-50'}} rounded" 
                                    href="{{ route('backend_dashboard.index') }}">
                                    <span class="inline-block mr-3">
                                        <x-dashboard-icon class="text-gray-300 w-5 h-5" />
                                    </span>
                                    <span>{{ __('Dashboard') }}</span>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center pl-3 py-3 pr-4 {{ request()->routeIs('backend_user.*') ? 'text-white bg-indigo-500' : 'text-gray-500 hover:bg-indigo-50'}} rounded" 
                                    href="{{ route('backend_user.index') }}">
                                    <span class="inline-block mr-3">
                                        <x-user-icon class="text-gray-300 w-5 h-5" />
                                    </span>
                                    <span>{{ __('Users') }}</span>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center pl-3 py-3 pr-4 {{ request()->routeIs('backend_role.*') ? 'text-white bg-indigo-500' : 'text-gray-500 hover:bg-indigo-50'}} rounded" 
                                    href="{{ route('backend_role.index') }}">
                                    <span class="inline-block mr-3">
                                        <x-role-icon class="text-gray-300 w-5 h-5" />
                                    </span>
                                    <span>{{ __('Roles') }}</span>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center pl-3 py-3 pr-4 {{ request()->routeIs('backend_article.*') ? 'text-white bg-indigo-500' : 'text-gray-500 hover:bg-indigo-50'}} rounded" 
                                    href="{{ route('backend_article.index') }}">
                                    <span class="inline-block mr-3">
                                        <x-article-icon class="text-gray-300 w-5 h-5" />
                                    </span>
                                    <span>{{ __('Articles') }}</span>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center pl-3 py-3 pr-4 {{ request()->routeIs('backend_category.*') ? 'text-white bg-indigo-500' : 'text-gray-500 hover:bg-indigo-50'}} rounded" 
                                    href="{{ route('backend_category.index') }}">
                                    <span class="inline-block mr-3">
                                        <x-category-icon class="text-gray-300 w-5 h-5" />
                                    </span>
                                    <span>{{ __('Categories') }}</span>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center pl-3 py-3 pr-4 {{ request()->routeIs('backend_tag.*') ? 'text-white bg-indigo-500' : 'text-gray-500 hover:bg-indigo-50'}} rounded" 
                                    href="{{ route('backend_tag.index') }}">
                                    <span class="inline-block mr-3">
                                        <x-tag-icon class="text-gray-300 w-5 h-5" />
                                    </span>
                                    <span>{{ __('Tags') }}</span>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center pl-3 py-3 pr-4 {{ request()->routeIs('backend_comment.*') ? 'text-white bg-indigo-500' : 'text-gray-500 hover:bg-indigo-50'}} rounded" 
                                    href="{{ route('backend_comment.index') }}">
                                    <span class="inline-block mr-3">
                                        <x-comment-icon class="text-gray-300 w-5 h-5" />
                                    </span>
                                    <span>{{ __('Comments') }}</span>
                                </a>
                            </li>
                        </ul>
                        <div class="pt-6">
                            <h3 class="mb-2 text-xs uppercase text-gray-500 font-medium">{{ __('Functions') }}</h3>
                            <form method="POST" action="{{ route('backend_auth.logout') }}">
                                @csrf
                                <button class="w-full" type="submit">
                                    <a class="flex items-center pl-3 py-3 pr-2 text-gray-500 hover:bg-indigo-50 rounded">
                                        <span class="inline-block mr-4">
                                            <x-logout-icon class="text-gray-300 w-5 h-5" />
                                        </span>
                                        <span>{{ __('Log Out') }}</span>
                                    </a>
                                </button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>

            <!-- Right Container -->
            <div class="mx-auto lg:ml-56">
                <!-- Top Navigation -->
                <div class="py-2 lg:py-5 px-6 bg-white border-b">
                    <nav class="relative">
                        <div class="flex items-center">
                            <div class="flex items-center mr-auto">
                                <a class="flex items-center text-sm hover:text-gray-800" href="{{ route('backend.home') }}">
                                    <span class="inline-block mr-2">
                                        <x-home-icon class="text-indigo-500" />
                                    </span>
                                    <span>{{ __('Home') }}</span>
                                </a>
                                @if(request()->routeIs('backend_dashboard.*'))
                                    <span class="inline-block mx-3">
                                        <x-arrow-right-icon class="text-indigo-500 w-4 h-4" />
                                    </span>
                                    <a class="flex items-center text-sm hover:text-gray-800" href="{{ route('backend_dashboard.index') }}">
                                        <span class="inline-block mr-2">
                                            <x-dashboard-icon class="text-indigo-500" width="20" height="20" />
                                        </span>
                                        <span>{{ __('Dashboard') }}</span>
                                    </a>
                                @elseif(request()->routeIs('backend_user.*'))
                                    <span class="inline-block mx-3">
                                        <x-arrow-right-icon class="text-indigo-500 w-4 h-4" />
                                    </span>
                                    <a class="flex items-center text-sm hover:text-gray-800" href="{{ route('backend_user.index') }}">
                                        <span class="inline-block mr-2">
                                            <x-user-icon class="text-indigo-500" width="20" height="20" />
                                        </span>
                                        <span>{{ __('Users') }}</span>
                                    </a>
                                @elseif(request()->routeIs('backend_role.*'))
                                    <span class="inline-block mx-3">
                                        <x-arrow-right-icon class="text-indigo-500 w-4 h-4" />
                                    </span>    
                                    <a class="flex items-center text-sm hover:text-gray-800" href="{{ route('backend_role.index') }}">
                                        <span class="inline-block mr-2">
                                            <x-role-icon class="text-indigo-500" width="20" height="20" />
                                        </span>
                                        <span>{{ __('Roles') }}</span>
                                    </a>
                                @elseif(request()->routeIs('backend_article.*'))
                                    <span class="inline-block mx-3">
                                        <x-arrow-right-icon class="text-indigo-500 w-4 h-4" />
                                    </span>    
                                    <a class="flex items-center text-sm hover:text-gray-800" href="{{ route('backend_article.index') }}">
                                        <span class="inline-block mr-2">
                                            <x-article-icon class="text-indigo-500" width="20" height="20" />
                                        </span>
                                        <span>{{ __('Articles') }}</span>
                                    </a>
                                @elseif(request()->routeIs('backend_category.*'))
                                    <span class="inline-block mx-3">
                                        <x-arrow-right-icon class="text-indigo-500 w-4 h-4" />
                                    </span>    
                                    <a class="flex items-center text-sm hover:text-gray-800" href="{{ route('backend_category.index') }}">
                                        <span class="inline-block mr-2">
                                            <x-category-icon class="text-indigo-500" width="20" height="20" />
                                        </span>
                                        <span>{{ __('Categories') }}</span>
                                    </a>
                                @elseif(request()->routeIs('backend_tag.*'))
                                    <span class="inline-block mx-3">
                                        <x-arrow-right-icon class="text-indigo-500 w-4 h-4" />
                                    </span>    
                                    <a class="flex items-center text-sm hover:text-gray-800" href="{{ route('backend_tag.index') }}">
                                        <span class="inline-block mr-2">
                                            <x-tag-icon class="text-indigo-500" width="20" height="20" />
                                        </span>
                                        <span>{{ __('Tags') }}</span>
                                    </a>
                                @elseif(request()->routeIs('backend_comment.*'))
                                    <span class="inline-block mx-3">
                                        <x-arrow-right-icon class="text-indigo-500 w-4 h-4" />
                                    </span>    
                                    <a class="flex items-center text-sm hover:text-gray-800" href="{{ route('backend_comment.index') }}">
                                        <span class="inline-block mr-2">
                                            <x-comment-icon class="text-indigo-500" width="20" height="20" />
                                        </span>
                                        <span>{{ __('Comments') }}</span>
                                    </a>
                                @else
                                @endif
                                @if(request()->routeIs('*.create'))
                                    <span class="inline-block mx-3">
                                        <x-arrow-right-icon class="text-indigo-500 w-4 h-4" />
                                    </span>  
                                    <span class="inline-block mr-2">
                                        {{ __('Create') }}
                                    </span>
                                @elseif(request()->routeIs('*.edit'))
                                    <span class="inline-block mx-3">
                                        <x-arrow-right-icon class="text-indigo-500 w-4 h-4" />
                                    </span>  
                                    <span class="inline-block mr-2">
                                        {{ __('Edit') }}
                                    </span>
                                @endif
                            </div>
                            <ul class="hidden lg:flex items-center space-x-6 mr-6">
                                <li>
                                    <!-- Locale -->
                                    <x-dropdown align="top" width="40">
                                        <!-- Click to open dropdown -->
                                        <x-slot name="trigger">
                                            <button class="p-2 flex items-center hover:bg-gray-300 rounded transition duration-150 ease-in-out">
                                                @php
                                                    if (session()->has('locale')) {
                                                        $locale = session()->get('locale');
                                                    } else {
                                                        $locale = 'en';
                                                    }
                                                @endphp
                                                @if ($locale === 'en')
                                                    <x-en-flag class="w-6 h-4" />
                                                @elseif ($locale === 'vi')
                                                    <x-vi-flag class="w-6 h-4" />
                                                @endif
                                                <div class="ml-1">
                                                    <svg class="fill-current h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>
                                        <!-- Dropdown -->
                                        <x-slot name="content">
                                            <div class="mx-1">
                                                <x-dropdown-link :href="route('locale', ['locale' => 'en'])">
                                                    <div class="flex items-center">
                                                        <x-en-flag class="w-6 h-4" />
                                                        <span class="text-sm pl-2">
                                                            English
                                                        </span>
                                                    </div>
                                                </x-dropdown-link>
                                            </div>
                                            <div class="mx-1">
                                                <x-dropdown-link :href="route('locale', ['locale' => 'vi'])">
                                                    <div class="flex items-center">
                                                        <x-vi-flag class="w-6 h-4" />
                                                        <span class="text-sm pl-2">
                                                            Tiếng Việt
                                                        </span>
                                                    </div>
                                                </x-dropdown-link>
                                            </div>
                                        </x-slot>
                                    </x-dropdown>
                                </li>
                                <li>
                                    <a class="text-gray-200 hover:text-gray-300" href="#">
                                        <x-search-icon class="h-5 w-5" />
                                    </a>
                                </li>
                                <li>
                                    <a class="text-gray-200 hover:text-gray-300" href="#">
                                        <x-message-icon class="h-5 w-5" />
                                    </a>
                                </li>
                                <li>
                                    <a class="text-gray-200 hover:text-gray-300" href="#">
                                        <x-notification-icon class="h-5 w-5" />
                                    </a>
                                </li>
                            </ul>
                            <div class="hidden lg:block">
                                <div class="flex items-center">
                                    <div class="mr-3">
                                        <p class="text-base font-medium">{{ Auth::user()->name }}</p>
                                    </div>
                                    <div class="mr-2">
                                        <img class="w-10 h-10 rounded-full object-cover object-right" src="http://trichdanhay.vn/wp-content/uploads/2020/09/nhung-cau-noi-hay-cua-huan-hoa-hong.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>

                <div class="m-4">
                    <!-- Page Content -->
                    <main>
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>
        
        @include('layouts.backend_footer')
    </body>
</html>
