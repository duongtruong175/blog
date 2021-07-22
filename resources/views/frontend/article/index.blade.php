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
                        @forelse([1,2,3] as $item)
                            <div class="w-full lg:w-2/4 p-4">
                                <div class="bg-white shadow rounded overflow-hidden sm:flex">
                                    <div class="w-full sm:w-4/12 flex">
                                        <div class="p-2 m-auto">
                                            <img width="200" height="200" src="https://vantien.net/wp-content/uploads/2019/01/5826817b0ad24b8126df6762b54ae1b7.png" alt="What is Laravel">
                                        </div>
                                    </div>
                                    <div class="w-full px-4 sm:w-8/12 sm:px-2 py-4">
                                        <div class="mt-4 text-2xl border-b">
                                            <a class="text-blue-500 hover:text-blue-800" href="{{ route('articles.show', 1) }}">What is Laravel</a>
                                        </div>
                                        <div class="text-sm mt-4 flex items-center text-center">
                                            <div class="font-bold">
                                                <p>Categories:</p>
                                            </div>
                                            <div class="ml-2">
                                                <p>News | Tutorial</p>
                                            </div>
                                        </div>
                                        <div class="text-sm mt-4 flex items-center text-center">
                                            <div class="font-bold">
                                                <p>Tags:</p>
                                            </div>
                                            <div class="ml-2">
                                                <p>Learning</p>
                                            </div>
                                        </div>
                                        <div class="text-sm mt-4 flex items-center text-center text-gray-500">
                                            <x-comment-icon width="20" height="20"/>
                                            <span class="ml-1">
                                                2
                                            </span>
                                        </div>
                                        <div class="text-sm my-4">
                                            <p>
                                                {{ substr('What is Laravel?
                                                The short version, is that Laravel is a PHP MVC Framework. The long version would be, Laravel is a free and open-source PHP Framework for Web Artisans based on Symfony.
                                                
                                                It helps craft Web Applications following the MVC (Model View Controller) design pattern. In order for us to better understand Laravel, we will build a simple blog application with Laravel from scratch.
                                                
                                                Requirements: To create a Laravel application you will need a few tools installed in your computer.
                                                
                                                These tools include:
                                                
                                                PHP >= 7.3.
                                                Database (MySql).
                                                A localhost Web Server – In our case we’ll use WAMP (for Windows), LAMP (for Linux), or MAMP (for MacOs). This localhost webserver comes installed with latest PHP and MySQL database so you will not need to install them manually. To install either MAMP, LAMP, or WAMP go to http://ampps.com/downloads and choose the software your platform.
                                                Composer – This is a dependency management software for PHP. To install the composer visit https://getcomposer.org/ and download it there for your platform.
                                                Node.js – This is a free and open source JavaScript runtime environment that executes JavaScript outside of the browser. We will not write any Node.js code but it will be used in the background by Laravel to streamline our development.
                                                Code editor – A code editor will be required. We recommend to use Visual Studio Code: It is free.
                                                A browser – Google Chrome, Edge, Safari, or Mozilla Firefox will do just fine.
                                                Background knowledge of the PHP Programming Language.
                                                With our machine setup complete, it’s time to start developing.', 0, 400) }}
                                                ... <a class="text-blue-500 hover:text-blue-800" href="{{ route('articles.show', 1) }}">Read full article</a>
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

                    @if([1,2,3])
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
                        <ul class="pl-10 py-6">
                            <li><a href="#">News</a></li>
                            <li class="pt-3"><a href="#">Opinion</a></li>
                            <li class="pt-3"><a href="#">Tutorial</a></li>
                            <li class="pt-3"><a href="#">Review</a></li>
                        </ul>
                    </div>
                </div>
                <div class="shadow mt-6">
                    <div class="text-xl font-bold p-4 bg-gray-100">
                        Tags
                    </div>
                    <div class="text-sm">
                        <ul class="pl-10 py-6">
                            <li><a href="#">Learning</a></li>
                            <li class="pt-3"><a href="#">For Fun</a></li>
                            <li class="pt-3"><a href="#">Machine learning</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
