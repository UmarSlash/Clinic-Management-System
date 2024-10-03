<!-- resources/views/components/breadcrumb.blade.php -->
@props(['items'])

<nav class="flex px-3 py-3 text-gray-700 bg-gray-100 rounded-lg" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        @foreach ($items as $item)
            @if (!$loop->last)
                <li class="inline-flex items-center">
                    <a href="{{ $item['url'] }}" class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-gray-900">
                        @if (isset($item['icon']))
                            <svg class="w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="{{ $item['icon'] }}"></path>
                            </svg>
                        @endif
                        {{ $item['label'] }}
                    </a>
                </li>
                <li>
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M15 19l-7-7 7-7"></path>
                    </svg>
                </li>
            @else
                <li aria-current="page">
                    <div class="inline-flex items-center text-lg font-medium text-gray-500">
                        @if (isset($item['icon']))
                            <svg class="w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="{{ $item['icon'] }}"></path>
                            </svg>
                        @endif
                        {{ $item['label'] }}
                    </div>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
