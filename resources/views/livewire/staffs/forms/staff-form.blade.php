{{-- <div>
    <div class="{{ !$showModel ? 'hidden' : 'block' }} fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center"
        wire:key="staff-{{ $showModel }}">
        <div class="relative p-4 w-full max-w-lg max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $staff->exists ? 'Edit Staff' : 'Add Staff' }}
                    </h3>
                    <button type="button" wire:click="cancel"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-1">
                        <div>
                            <div class="relative">
                                <input wire:model="name" type="text" id="name" aria-describedby="name_help"
                                    class="block px-4 pb-4 pt-6 w-full text-md text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white peer
                                    dark:border-gray-500 border-gray-600 dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600"
                                    placeholder=" " autofocus />
                                <label for="name"
                                    class="absolute text-md duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                                    {{ __('Name') }}
                                </label>
                            </div>
                            @error('name')
                                <p id="name_help"
                                    class="mt-2 text-xs text-red-600 dark:text-red-400"> {{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <div class="relative">
                                <input wire:model="email" type="text" id="email" aria-describedby="email_help"
                                    class="block px-4 pb-4 pt-6 w-full text-md text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white peer
                                    dark:border-gray-500 border-gray-600 dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600"
                                    placeholder=" " />
                                <label for="email"
                                    class="absolute text-md duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                                    {{ __('Email') }}
                                </label>
                            </div>
                            @error('email')
                                <p id="email_help"
                                    class="mt-2 text-xs text-red-600 dark:text-red-400"> {{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <div class="relative">
                                <input wire:model="gender" type="text" id="gender" aria-describedby="gender_help"
                                    class="block px-4 pb-4 pt-6 w-full text-md text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white peer
                                    dark:border-gray-500 border-gray-600 dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600"
                                    placeholder=" " />
                                <label for="gender"
                                    class="absolute text-md duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                                    {{ __('Gender') }}
                                </label>
                            </div>
                            @error('gender')
                                <p id="gender_help"
                                    class="mt-2 text-xs text-red-600 dark:text-red-400"> {{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <div class="relative">
                                <input wire:model="phone_no" type="text" id="phone_no" aria-describedby="phone_no_help"
                                    class="block px-4 pb-4 pt-6 w-full text-md text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white peer
                                    dark:border-gray-500 border-gray-600 dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600"
                                    placeholder=" " />
                                <label for="phone_no"
                                    class="absolute text-md duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                                    {{ __('Phone Number') }}
                                </label>
                            </div>
                            @error('phone_no')
                                <p id="phone_no_help"
                                    class="mt-2 text-xs text-red-600 dark:text-red-400"> {{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <div class="relative">
                                <input wire:model="job" type="text" id="job" aria-describedby="job_help"
                                    class="block px-4 pb-4 pt-6 w-full text-md text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white peer
                                    dark:border-gray-500 border-gray-600 dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600"
                                    placeholder=" " />
                                <label for="job"
                                    class="absolute text-md duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                                    {{ __('Job') }}
                                </label>
                            </div>
                            @error('job')
                                <p id="job_help"
                                    class="mt-2 text-xs text-red-600 dark:text-red-400"> {{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="flex justify-start">
                        @if (session()->has('message'))
                            <div id="toast-success"
                                class="flex items-center w-full max-w-sm p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                                role="alert">
                                <div
                                    class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                    <svg class="w-5 h-5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                    </svg>
                                    <span class="sr-only">Check icon</span>
                                </div>
                                <div class="ms-3 text-sm font-normal">{{ session('message') }}</div>
                            </div>
                        @endif
                    </div>

                    <div class="flex justify-end">
                        <button type="button" wire:click="save"
                            class="text-white inline-flex items-center bg-teal-500 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                            @if ($staff->exists)
                                <svg class="mr-2 w-6 h-6 text-white dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="M11 16h2m6.707-9.293-2.414-2.414A1 1 0 0 0 16.586 4H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V7.414a1 1 0 0 0-.293-.707ZM16 20v-6a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v6h8ZM9 4h6v3a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V4Z" />
                                </svg>
                            @else
                                <svg class="mr-2 w-6 h-6 text-white dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 12h14m-7 7V5" />
                                </svg>
                            @endif
                            {{ $staff->exists ? 'Save' : 'Add' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
<div class="bg-gray-100 dark:bg-gray-800 transition-colors duration-300">
    <div class="container mx-auto p-4">
        <div class="flex justify-end">
            <x-clinic.flash-success/>
        </div>
        <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">
                @if ($staff->exists)
                    Edit Staff Information
                @else
                    Add New Staff
                @endif
            </h1>
            <p class="text-gray-600 dark:text-gray-300 mb-6">Make sure to insert the correct information</p>
            <form>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <input type="text" wire:model="name" placeholder="Name" class="border p-2 rounded w-full">
                        @error('name')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <input type="text" wire:model="email" placeholder="Email" class="border p-2 rounded w-full">
                        @error('email')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <input type="text" wire:model="gender" placeholder="Gender"
                            class="border p-2 rounded w-full">
                        @error('gender')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <input type="text" wire:model="phone_no" placeholder="Phone No"
                            class="border p-2 rounded w-full">
                        @error('phone_no')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <input type="text" wire:model="job" placeholder="Job" class="border p-2 rounded w-full">
                    @error('job')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <button wire:click="save" type="button"
                    class="relative h-12 px-4 py-2 overflow-hidden border border-teal-500 bg-teal-500 text-white font-bold rounded flex items-center transition-all shadow-2xl before:absolute before:right-0 before:top-0 before:h-12 before:w-6 before:translate-x-12 before:rotate-6 before:bg-white before:opacity-10 before:duration-700 hover:bg-teal-700 hover:shadow-teal-500 hover:before:-translate-x-40">
                    <svg class="mr-2 w-6 h-6 text-white dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                    <span>{{ $staff->exists ? __('Update') : __('Add') }}</span>
                </button>
            </form>
        </div>
    </div>
</div>
