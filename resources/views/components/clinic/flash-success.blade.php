<div x-data="{ show: false }" x-show="show" x-init="@if (session()->has('message')) show = true; 
    setTimeout(() => show = false, 3000); @endif"
x-transition:enter="transition ease-out duration-500"
x-transition:enter-start="opacity-0 transform translate-x-full"
x-transition:enter-end="opacity-100 transform translate-x-0"
x-transition:leave="transition ease-in duration-500"
x-transition:leave-start="opacity-100 transform translate-x-0"
x-transition:leave-end="opacity-0 transform -translate-x-full"
class="flex items-center w-full max-w-sm p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-lg dark:text-gray-400 dark:bg-gray-800 fixed top-4 right-4 z-50"
role="alert">
<div
class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
    viewBox="0 0 20 20">
    <path
        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
</svg>
<span class="sr-only">Check icon</span>
</div>
<div class="ms-3 text-sm font-normal">{{ session('message') }}</div>
</div>