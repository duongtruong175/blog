<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ? $title : 'Admin' }}</title>

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
                        <span class="ml-4 font-medium text-2xl">Blog</span>
                    </div>
                    <button class="navbar-burger flex items-center rounded focus:outline-none">
                        <svg class="text-white bg-indigo-500 hover:bg-indigo-600 block h-8 w-8 p-2 rounded" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                            <title>Admin menu</title>
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
                            <span class="ml-4 font-medium text-2xl">Blog</span>
                        </div>
                    </div>
                    <div class="px-4 pb-6">
                        <h3 class="mb-2 text-xs uppercase text-gray-500 font-medium">Resource</h3>
                        <ul class="mb-8 text-sm font-medium">
                            <li>
                                <a class="flex items-center pl-3 py-3 pr-4 {{ request()->routeIs('backend_dashboard.*') ? 'text-white bg-indigo-500' : 'text-gray-500 hover:bg-indigo-50'}} rounded" 
                                    href="{{ route('backend_dashboard.index') }}">
                                    <span class="inline-block mr-3">
                                        <x-dashboard-icon class="text-gray-300 w-5 h-5" />
                                    </span>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center pl-3 py-3 pr-4 {{ request()->routeIs('backend_user.*') ? 'text-white bg-indigo-500' : 'text-gray-500 hover:bg-indigo-50'}} rounded" 
                                    href="{{ route('backend_user.index') }}">
                                    <span class="inline-block mr-3">
                                        <x-user-icon class="text-gray-300 w-5 h-5" />
                                    </span>
                                    <span>Users</span>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center pl-3 py-3 pr-4 {{ request()->routeIs('backend_role.*') ? 'text-white bg-indigo-500' : 'text-gray-500 hover:bg-indigo-50'}} rounded" 
                                    href="{{ route('backend_role.index') }}">
                                    <span class="inline-block mr-3">
                                        <x-role-icon class="text-gray-300 w-5 h-5" />
                                    </span>
                                    <span>Roles</span>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center pl-3 py-3 pr-4 {{ request()->routeIs('backend_article.*') ? 'text-white bg-indigo-500' : 'text-gray-500 hover:bg-indigo-50'}} rounded" 
                                    href="{{ route('backend_article.index') }}">
                                    <span class="inline-block mr-3">
                                        <x-article-icon class="text-gray-300 w-5 h-5" />
                                    </span>
                                    <span>Articles</span>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center pl-3 py-3 pr-4 {{ request()->routeIs('backend_category.*') ? 'text-white bg-indigo-500' : 'text-gray-500 hover:bg-indigo-50'}} rounded" 
                                    href="{{ route('backend_category.index') }}">
                                    <span class="inline-block mr-3">
                                        <x-category-icon class="text-gray-300 w-5 h-5" />
                                    </span>
                                    <span>Categories</span>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center pl-3 py-3 pr-4 {{ request()->routeIs('backend_tag.*') ? 'text-white bg-indigo-500' : 'text-gray-500 hover:bg-indigo-50'}} rounded" 
                                    href="{{ route('backend_tag.index') }}">
                                    <span class="inline-block mr-3">
                                        <x-tag-icon class="text-gray-300 w-5 h-5" />
                                    </span>
                                    <span>Tags</span>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center pl-3 py-3 pr-4 {{ request()->routeIs('backend_comment.*') ? 'text-white bg-indigo-500' : 'text-gray-500 hover:bg-indigo-50'}} rounded" 
                                    href="{{ route('backend_comment.index') }}">
                                    <span class="inline-block mr-3">
                                        <x-comment-icon class="text-gray-300 w-5 h-5" />
                                    </span>
                                    <span>Comments</span>
                                </a>
                            </li>
                        </ul>
                        <div class="pt-6">
                            <h3 class="mb-2 text-xs uppercase text-gray-500 font-medium">Functions</h3>
                            <a class="flex items-center pl-3 py-3 pr-2 text-gray-500 hover:bg-indigo-50 rounded" href="#">
                                <span class="inline-block mr-4">
                                    <x-logout-icon class="text-gray-300 w-5 h-5" />
                                </span>
                                <span>Log Out</span>
                            </a>
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
                                    <span>Home</span>
                                </a>
                                @if(request()->routeIs('backend_dashboard.*'))
                                    <span class="inline-block mx-3">
                                        <x-arrow-right-icon class="text-indigo-500" width="6" height="10" />
                                    </span>
                                    <a class="flex items-center text-sm hover:text-gray-800" href="{{ route('backend_dashboard.index') }}">
                                        <span class="inline-block mr-2">
                                            <x-dashboard-icon class="text-indigo-500" width="20" height="20" />
                                        </span>
                                        <span>Dashboard</span>
                                    </a>
                                @elseif(request()->routeIs('backend_user.*'))
                                    <span class="inline-block mx-3">
                                        <x-arrow-right-icon class="text-indigo-500" width="6" height="10" />
                                    </span>
                                    <a class="flex items-center text-sm hover:text-gray-800" href="{{ route('backend_user.index') }}">
                                        <span class="inline-block mr-2">
                                            <x-user-icon class="text-indigo-500" width="20" height="20" />
                                        </span>
                                        <span>Users</span>
                                    </a>
                                @elseif(request()->routeIs('backend_role.*'))
                                    <span class="inline-block mx-3">
                                        <x-arrow-right-icon class="text-indigo-500" width="6" height="10" />
                                    </span>    
                                    <a class="flex items-center text-sm hover:text-gray-800" href="{{ route('backend_role.index') }}">
                                        <span class="inline-block mr-2">
                                            <x-role-icon class="text-indigo-500" width="20" height="20" />
                                        </span>
                                        <span>Roles</span>
                                    </a>
                                @elseif(request()->routeIs('backend_article.*'))
                                    <span class="inline-block mx-3">
                                        <x-arrow-right-icon class="text-indigo-500" width="6" height="10" />
                                    </span>    
                                    <a class="flex items-center text-sm hover:text-gray-800" href="{{ route('backend_article.index') }}">
                                        <span class="inline-block mr-2">
                                            <x-article-icon class="text-indigo-500" width="20" height="20" />
                                        </span>
                                        <span>Aricles</span>
                                    </a>
                                @elseif(request()->routeIs('backend_category.*'))
                                    <span class="inline-block mx-3">
                                        <x-arrow-right-icon class="text-indigo-500" width="6" height="10" />
                                    </span>    
                                    <a class="flex items-center text-sm hover:text-gray-800" href="{{ route('backend_category.index') }}">
                                        <span class="inline-block mr-2">
                                            <x-category-icon class="text-indigo-500" width="20" height="20" />
                                        </span>
                                        <span>Categories</span>
                                    </a>
                                @elseif(request()->routeIs('backend_tag.*'))
                                    <span class="inline-block mx-3">
                                        <x-arrow-right-icon class="text-indigo-500" width="6" height="10" />
                                    </span>    
                                    <a class="flex items-center text-sm hover:text-gray-800" href="{{ route('backend_tag.index') }}">
                                        <span class="inline-block mr-2">
                                            <x-tag-icon class="text-indigo-500" width="20" height="20" />
                                        </span>
                                        <span>Tags</span>
                                    </a>
                                @elseif(request()->routeIs('backend_comment.*'))
                                    <span class="inline-block mx-3">
                                        <x-arrow-right-icon class="text-indigo-500" width="6" height="10" />
                                    </span>    
                                    <a class="flex items-center text-sm hover:text-gray-800" href="{{ route('backend_comment.index') }}">
                                        <span class="inline-block mr-2">
                                            <x-comment-icon class="text-indigo-500" width="20" height="20" />
                                        </span>
                                        <span>Comments</span>
                                    </a>
                                @else
                                @endif
                                @if(request()->routeIs('*.create'))
                                    <span class="inline-block mx-3">
                                        <x-arrow-right-icon class="text-indigo-500" width="6" height="10" />
                                    </span>  
                                    <span class="inline-block mr-2">
                                        Create
                                    </span>
                                @elseif(request()->routeIs('*.edit'))
                                    <span class="inline-block mx-3">
                                        <x-arrow-right-icon class="text-indigo-500" width="6" height="10" />
                                    </span>  
                                    <span class="inline-block mr-2">
                                        Edit
                                    </span>
                                @endif
                            </div>
                            <ul class="hidden lg:flex items-center space-x-6 mr-6">
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
                                        <p class="text-sm">Admin</p>
                                        <p class="text-sm text-gray-400">Developer</p>
                                    </div>
                                    <div class="mr-2">
                                        <img class="w-10 h-10 rounded-full object-cover object-right" src="http://trichdanhay.vn/wp-content/uploads/2020/09/nhung-cau-noi-hay-cua-huan-hoa-hong.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>

                <div class="m-8">
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
