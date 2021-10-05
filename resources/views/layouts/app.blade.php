<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ? $title : __('Blog') }}</title>

        @include('layouts.header')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            <!-- Navigation -->
            <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <!-- Left Navigation -->
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex-shrink-0 flex items-center">
                                <a href="{{ route('home') }}">
                                    <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                                </a>
                                <span class="ml-4 font-medium text-2xl">
                                    {{ __('Blog') }}
                                </span>
                            </div>
            
                            <!-- Links on Left Naigation-->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                                    {{ __('Home') }}
                                </x-nav-link>
                                <x-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.*')">
                                    {{ __('Articles') }}
                                </x-nav-link>
                                <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                                    {{ __('About Us') }}
                                </x-nav-link>

                                <!-- Locale -->
                                <x-dropdown align="top" width="40">
                                    <!-- Click to open dropdown -->
                                    <x-slot name="trigger">
                                        <button class="p-2 flex items-center hover:bg-gray-300 rounded transition duration-150 ease-in-out">
                                            @php
                                                $locale = app()->getLocale();
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
                            </div>
                        </div>
            
                        <!-- Links on Right Navigation + Settings Dropdown (screen > sm (640px)) -->
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            @auth
                                <x-dropdown align="right" width="40">
                                    <x-slot name="trigger">
                                        <button class="flex items-center text-base font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                            <div>{{ Auth::user()->name }}</div>
            
                                            <div class="ml-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>
            
                                    <x-slot name="content">
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
            
                                            <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @else
                                <div class="px-6 py-4 flex">
                                    <a href="{{ route('login') }}" class="flex items-center text-sm text-white bg-green-500 hover:bg-green-800 font-medium px-4 py-2 rounded-2xl">{{ __('Log In') }}</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="flex items-center ml-4 text-sm text-white bg-green-500 hover:bg-green-800 font-medium px-4 py-2 rounded-2xl">{{ __('Register') }}</a>
                                    @endif
                                </div>
                            @endauth
                        </div>
            
                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            
                <!-- Responsive Navigation Menu -->
                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                            {{ __('Home') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.*')">
                            {{ __('Articles') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                            {{ __('About Us') }}
                        </x-responsive-nav-link>
                        <div class="ml-2">
                            <!-- Locale -->
                            <x-dropdown align="top" width="40">
                                <!-- Click to open dropdown -->
                                <x-slot name="trigger">
                                    <button class="p-2 flex items-center hover:bg-gray-300 rounded transition duration-150 ease-in-out">
                                        @php
                                            $locale = app()->getLocale();
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
                        </div>
                    </div>
            
                    <!-- Responsive Settings Options -->
                    @auth
                        <div class="pt-4 pb-1 border-t border-gray-200">
                            <div class="px-4">
                                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                            </div>
            
                            <div class="mt-3 space-y-1">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
            
                                    <x-responsive-nav-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-responsive-nav-link>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="pt-2 pb-3 border-t border-gray-200">
                            <div class="space-y-1">
                                <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">{{ __('Log In') }}</x-responsive-nav-link>
                            </div>
                            @if (Route::has('register'))            
                                <div class="mt-3 space-y-1">
                                    <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">{{ __('Register') }}</x-responsive-nav-link>
                                </div>
                            @endif
                        </div>
                    @endauth
                </div>
            </nav>            

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @include('layouts.footer')
    </body>
</html>
