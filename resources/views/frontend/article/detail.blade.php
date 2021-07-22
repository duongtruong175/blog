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
                    <div class="bg-white shadow rounded">
                        <div class="text-3xl font-bold p-4 bg-gray-100">
                            What is Laravel
                        </div>
                        <div class="w-full">
                            <div class="pt-12 pl-4 pb-4">
                                <img width="200" height="200" src="https://vantien.net/wp-content/uploads/2019/01/5826817b0ad24b8126df6762b54ae1b7.png" alt="What is Laravel">
                            </div>
                        </div>
                        <div class="w-full p-4 text-base">
                            <div class="mt-4 flex items-center text-center">
                                <div class="font-bold">
                                    <p>Categories:</p>
                                </div>
                                <div class="ml-2">
                                    <p>News | Tutorial</p>
                                </div>
                            </div>
                            <div class="mt-4 flex items-center text-center">
                                <div class="font-bold">
                                    <p>Tags:</p>
                                </div>
                                <div class="ml-2">
                                    <p>Learning</p>
                                </div>
                            </div>
                            <div class="my-4">
                                <p>
                                    {!! nl2br('What is Laravel?
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
                                    With our machine setup complete, it’s time to start developing.') !!}
                                </p>
                            </div>
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
