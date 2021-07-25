{{-- Pagination --}}
<div class="flex flex-wrap justify-between text-sm">
    <div class="w-full lg:w-auto mb-4 lg:mb-0 flex items-center">
        <p class="text-center">
            <span>{{ __('Showing')}}</span>
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            <span>{{ __('to') }}</span>
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
            <span>{{ __('of') }}</span>
            <span class="font-medium">{{ $paginator->total() }}</span>
            <span>{{ __('results') }}</span>
        </p>
    </div>

    <div class="w-full lg:w-auto flex items-center justify-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="my-1 mr-1 w-8 h-8 inline-flex items-center justify-center border border-gray-300 bg-white rounded" aria-disabled="true">
                <x-arrow-left-icon class="w-3 h-3 text-gray-300" />
            </a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="my-1 mr-1 w-8 h-8 inline-flex items-center justify-center border border-gray-300 hover:bg-indigo-50 bg-white rounded">
                <x-arrow-left-icon class="w-3 h-3 text-black" />
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="inline-block m-1">
                    <x-etc-icon class="h-3 w-3 text-gray-500" />
                </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="cursor-default inline-flex m-1 items-center justify-center w-8 h-8 text-white bg-indigo-500 rounded" aria-disabled="true">
                            {{ $page }}
                        </a>
                    @else
                        <a href="{{ $url }}" class="m-1 w-8 h-8 inline-flex items-center justify-center border border-gray-300 hover:bg-indigo-50 bg-white rounded">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="my-1 ml-1 w-8 h-8 inline-flex items-center justify-center border border-gray-300 hover:bg-indigo-50 bg-white rounded">
                <x-arrow-right-icon class="w-3 h-3 text-black" />
            </a>
        @else
            <a class="my-1 ml-1 w-8 h-8 inline-flex items-center justify-center border border-gray-300 bg-white rounded" aria-disabled="true">
                <x-arrow-right-icon class="w-3 h-3 text-gray-300" />
            </a>
        @endif
    </div>
</div>
