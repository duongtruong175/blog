<x-app-layout>
    <x-slot name="title">
        Articles
    </x-slot>

    <div class="mx-4 px-2 py-4 lg:flex">
        <!-- Nội dung bên trái -->
        <div class="w-full lg:w-3/4">
            <div class="py-8">
                <div class="container px-4 mx-auto">
                    <div class="flex flex-wrap -m-4">
                        <!-- Danh sách các bài -->
                        @forelse([1,2,3] as $item)
                            <div class="w-full lg:w-2/4 p-4">
                                <div class="bg-white shadow rounded overflow-hidden">
                                    <div class="pt-6 px-6 mb-10 flex justify-between items-center">
                                        <span class="inline-flex items-center justify-center w-9 h-10 bg-gray-50 rounded">
                                        <img class="h-6" src="artemis-assets/mini-logos/spotify.svg" alt="">
                                        </span>
                                        <a class="py-1 px-2 bg-blue-50 text-xs text-indigo-500 rounded-full" href="#">Pending</a>
                                    </div>
                                    <div class="px-6 mb-6">
                                        <h4 class="text-xl font-bold">Spotify</h4>
                                        <p class="text-xs text-gray-500">Example of the team working on a project</p>
                                    </div>
                                    <div class="p-6 bg-lightGray-50">
                                        <div class="flex -mx-2 mb-6">
                                            <div class="w-1/2 px-2">
                                                <p class="mb-2 text-xs font-medium">Final Date</p>
                                                <span class="inline-block py-1 px-2 bg-orange-50 rounded-full text-xs text-red-500">14 March 2021</span>
                                            </div>
                                            <div class="w-1/2 px-2">
                                                <p class="mb-2 text-xs font-medium">Budget</p>
                                                <span class="inline-block py-1 px-2 bg-green-50 rounded-full text-xs text-green-500">$12,500</span>
                                            </div>
                                        </div>
                                        <div class="flex mb-6">
                                            <img class="w-8 h-8 rounded-full object-cover object-right" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1050&amp;q=80" alt="">
                                            <img class="w-8 h-8 -ml-2 rounded-full object-cover" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1050&amp;q=80" alt="">
                                            <img class="w-8 h-8 -ml-2 rounded-full object-cover object-top" src="https://images.unsplash.com/photo-1528936466093-76ffdfcf7a40?ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8MXx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60" alt="">
                                            <img class="w-8 h-8 -ml-2 rounded-full object-cover" src="https://images.unsplash.com/photo-1564564321837-a57b7070ac4f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1055&amp;q=80" alt="">
                                            <div class="flex items-center justify-center w-8 h-8 -ml-2 rounded-full bg-indigo-50 text-xs text-indigo-500">+3</div>
                                        </div>
                                        <p class="mb-2 text-xs font-medium">During the testing</p>
                                        <div class="relative w-full h-1 mb-3 rounded-full bg-blue-100">
                                            <div class="absolute top-0 left-0 h-full w-1/2 rounded-full bg-purple-500"></div>
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
                        <!-- Thanh chia dữ liệu bảng -->
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

        <!-- Thanh nav bên phải -->
        <div class="w-full lg:w-1/4">
            <div class="py-8 mx-3">
                <div class="shadow">
                    <div class="text-xl font-bold p-4 border-b">
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
                    <div class="text-xl font-bold p-4 border-b">
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
                    <div class="text-xl font-bold p-4 border-b">
                        Tags
                    </div>
                    <div class="text-sm">
                        <ul class="pl-10 py-6">
                            <li><a href="#">Learn</a></li>
                            <li class="pt-3"><a href="#">For Fun</a></li>
                            <li class="pt-3"><a href="#">Machine learning</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>