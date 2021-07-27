<x-backend_app-layout>
    <x-slot name="title">
        {{ __('Dashboard') }}
    </x-slot>
    
    <!-- Header + Contain dashboard -->
    <div class="text-3xl p-4 mb-8">
        {{ __('Dashboard') }}
    </div>
    <div class="flex flex-wrap">
        <div class="w-1/2 sm:w-1/3 lg:w-1/4 px-2">
            <div class="bg-blue-400 relative rounded mb-4">
                <div class="items-center text-center sm:text-left sm:block text-white p-6">
                    <div class="font-extrabold text-3xl">
                        {{ $total_users }}
                    </div>
                    <div class="text-sm mt-2 font-medium">
                        {{ __('Users Registrations') }}
                    </div>
                </div>
                <div class="hidden sm:block absolute top-1/3 right-4">
                    <x-user-icon class="w-8 h-8 transition duration-300 transform hover:scale-125" style="color: rgba(0, 0, 0, 0.15)" />
                </div>
                <a class="flex justify-center cursor-pointer text-center p-1 w-full" style="background-color: rgba(0,0,0,.1)">
                    <span class="text-white text-sm mr-1">{{ __('More info') }}</span>
                    <x-arrow-circle-right-icon class="h-5 w-5 text-white inline-block" />
                </a>
            </div>
        </div>
        <div class="w-1/2 sm:w-1/3 lg:w-1/4 px-2">
            <div class="bg-green-400 relative rounded mb-4">
                <div class="items-center text-center sm:text-left sm:block text-white p-6">
                    <div class="font-extrabold text-3xl">
                        {{ $total_articles }}
                    </div>
                    <div class="text-sm mt-2 font-medium">
                        {{ __('Articles Written') }}
                    </div>
                </div>
                <div class="hidden sm:block absolute top-1/3 right-4">
                    <x-article-icon class="w-8 h-8 transition duration-300 transform hover:scale-125" style="color: rgba(0, 0, 0, 0.15)" />
                </div>
                <a class="flex justify-center cursor-pointer text-center p-1 w-full" style="background-color: rgba(0,0,0,.1)">
                    <span class="text-white text-sm mr-1">{{ __('More info') }}</span>
                    <x-arrow-circle-right-icon class="h-5 w-5 text-white inline-block" />
                </a>
            </div>
        </div>
        <div class="w-1/2 sm:w-1/3 lg:w-1/4 px-2">
            <div class="bg-yellow-400 relative rounded mb-4">
                <div class="items-center text-center sm:text-left sm:block text-white p-6">
                    <div class="font-extrabold text-3xl">
                        {{ $total_categories }}
                    </div>
                    <div class="text-sm mt-2 font-medium">
                        {{ __('Categories Created') }}
                    </div>
                </div>
                <div class="hidden sm:block absolute top-1/3 right-4">
                    <x-category-icon class="w-8 h-8 transition duration-300 transform hover:scale-125" style="color: rgba(0, 0, 0, 0.15)" />
                </div>
                <a class="flex justify-center cursor-pointer text-center p-1 w-full" style="background-color: rgba(0,0,0,.1)">
                    <span class="text-white text-sm mr-1">{{ __('More info') }}</span>
                    <x-arrow-circle-right-icon class="h-5 w-5 text-white inline-block" />
                </a>
            </div>
        </div>
        <div class="w-1/2 sm:w-1/3 lg:w-1/4 px-2">
            <div class="bg-red-500 relative rounded mb-4">
                <div class="items-center text-center sm:text-left sm:block text-white p-6">
                    <div class="font-extrabold text-3xl">
                        {{ $total_tags }}
                    </div>
                    <div class="text-sm mt-2 font-medium">
                        {{ __('Tags Created') }}
                    </div>
                </div>
                <div class="hidden sm:block absolute top-1/3 right-4">
                    <x-tag-icon class="w-8 h-8 transition duration-300 transform hover:scale-125" style="color: rgba(0, 0, 0, 0.15)" />
                </div>
                <a class="flex justify-center cursor-pointer text-center p-1 w-full" style="background-color: rgba(0,0,0,.1)">
                    <span class="text-white text-sm mr-1">{{ __('More info') }}</span>
                    <x-arrow-circle-right-icon class="h-5 w-5 text-white inline-block" />
                </a>
            </div>
        </div>
        <div class="w-1/2 sm:w-1/3 lg:w-1/4 px-2">
            <div class="bg-indigo-500 relative rounded mb-4">
                <div class="items-center text-center sm:text-left sm:block text-white p-6">
                    <div class="font-extrabold text-3xl">
                        {{ $total_comments }}
                    </div>
                    <div class="text-sm mt-2 font-medium">
                        {{ __('Comments Written') }}
                    </div>
                </div>
                <div class="hidden sm:block absolute top-1/3 right-4">
                    <x-comment-icon class="w-8 h-8 transition duration-300 transform hover:scale-125" style="color: rgba(0, 0, 0, 0.15)" />
                </div>
                <a class="flex justify-center cursor-pointer text-center p-1 w-full" style="background-color: rgba(0,0,0,.1)">
                    <span class="text-white text-sm mr-1">{{ __('More info') }}</span>
                    <x-arrow-circle-right-icon class="h-5 w-5 text-white inline-block" />
                </a>
            </div>
        </div>
        <div class="w-1/2 sm:w-1/3 lg:w-1/4 px-2">
            <div class="bg-pink-500 relative rounded mb-4">
                <div class="items-center text-center sm:text-left sm:block text-white p-6">
                    <div class="font-extrabold text-3xl">
                        {{ $total_roles }}
                    </div>
                    <div class="text-sm mt-2 font-medium">
                        {{ __('Roles Created') }}
                    </div>
                </div>
                <div class="hidden sm:block absolute top-1/3 right-4">
                    <x-role-icon class="w-8 h-8 transition duration-300 transform hover:scale-125" style="color: rgba(0, 0, 0, 0.15)" />
                </div>
                <a class="flex justify-center cursor-pointer text-center p-1 w-full" style="background-color: rgba(0,0,0,.1)">
                    <span class="text-white text-sm mr-1">{{ __('More info') }}</span>
                    <x-arrow-circle-right-icon class="h-5 w-5 text-white inline-block" />
                </a>
            </div>
        </div>
    </div>
</x-backend_app-layout>
