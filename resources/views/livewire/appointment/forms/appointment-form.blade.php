{{-- <div>
    <style>
        .-z-1 {
            z-index: -1;
        }

        .origin-0 {
            transform-origin: 0%;
        }

        input:focus~label,
        input:not(:placeholder-shown)~label,
        textarea:focus~label,
        textarea:not(:placeholder-shown)~label,
        select:focus~label,
        select:not([value='']):valid~label {
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            --tw-scale-x: 0.75;
            --tw-scale-y: 0.75;
            --tw-translate-y: -1.5rem;
        }

        input:focus~label,
        select:focus~label {
            --tw-text-opacity: 1;
            color: rgba(0, 0, 0, var(--tw-text-opacity));
            left: 0px;
        }
    </style>
    <div class="{{ !$showModel ? 'hidden' : 'block' }} fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center"
        wire:key="appointments-{{ $showModel }}">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Book Appointment
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
                        <div class="relative z-0 w-full mb-5">
                            <div class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                                id="doctor">
                                {{ $name }}
                            </div>
                            <label for="doctor"
                                class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500 transform scale-75 -translate-y-6">
                                Doctor
                            </label>
                            @error('doctor')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- IC -->
                        <div class="relative z-0 w-full mb-5">
                            <input type="text" wire:model="ic" name="ic" placeholder=" "
                                class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            <label for="ic"
                                class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">IC</label>
                            @error('ic')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Date -->
                        <div class="relative z-0 w-full mb-5">
                            <input type="text" wire:model="date" name="date" placeholder=" "
                                onclick="this.setAttribute('type', 'date');"
                                class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            <label for="date"
                                class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Date</label>
                            @error('date')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Time -->
                        <div class="relative z-0 w-full mb-5">
                            <input type="text" wire:model="time" name="time" placeholder=" "
                                onclick="this.setAttribute('type', 'time');"
                                class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            <label for="time"
                                class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Time</label>
                            @error('time')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="relative z-0 w-full mb-5">
                            <input type="text" wire:model="description" name="description" placeholder=" "
                                class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            <label for="description"
                                class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Description</label>
                            @error('description')
                                <span class="text-sm text-red-600">{{ $message }}</span>
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
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
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
                        <!-- Submit Button -->
                        <button type="button" wire:click="save"
                            class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-teal-500 hover:bg-teal-600 hover:shadow-lg focus:outline-none">
                            Book Appointment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
<div>
    <div class="{{ !$showModel ? 'hidden' : 'block' }} fixed inset-0 z-[100] bg-black bg-opacity-50 flex items-center justify-center"
        wire:key="appointments-{{ $showModel }}">
        <div class="relative p-4 w-full max-w-3xl max-h-full">
            <div class="relative bg-white dark:bg-gray-700 shadow p-6 rounded-lg">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Book Appointment
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
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="mt-8">
                            <label for="name" class="font-serif text-md font-bold text-blue-900">Name</label>
                            <div class="relative mt-4">
                                <input type="text" wire:model="name" name="name" placeholder=" "
                                    value="{{ $name }}" disabled
                                    class="block w-full rounded-lg border border-teal-600 bg-teal-50 p-2.5 pl-10 text-teal-800 outline-none ring-opacity-30 placeholder:text-teal-800 focus:ring focus:ring-teal-300 sm:text-sm" />
                                @error('name')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-8">
                            <label for="ic" class="font-serif text-md font-bold text-blue-900">IC</label>
                            <div class="relative mt-4">
                                <input type="text" wire:model="ic" name="ic" placeholder=" "
                                    class="block w-full rounded-lg border border-teal-600 bg-teal-50 p-2.5 pl-10 text-teal-800 outline-none ring-opacity-30 placeholder:text-teal-800 focus:ring focus:ring-teal-300 sm:text-sm" />
                                @error('ic')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mt-8">
                        <label for="description" class="font-serif text-md font-bold text-blue-900">Description</label>
                        <div class="relative mt-4">
                            <textarea wire:model="description" name="description" rows="3" placeholder=" "
                                class="block w-full rounded-lg border border-teal-600 bg-teal-50 p-2.5 pl-10 text-teal-800 outline-none ring-opacity-30 placeholder:text-teal-800 focus:ring focus:ring-teal-300 sm:text-sm"></textarea>
                            @error('description')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="mt-8">
                            <p class="font-serif text-md font-bold text-blue-900">Select a date</p>
                            <div class="relative mt-4 w-56">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg aria-hidden="true" class="h-5 w-5 text-gray-500" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text" wire:model.live="date" name="date" placeholder=" "
                                    onclick="this.setAttribute('type', 'date');"
                                    class="block w-full rounded-lg border border-teal-600 bg-teal-50 p-2.5 pl-10 text-teal-800 outline-none ring-opacity-30 placeholder:text-teal-800 focus:ring focus:ring-teal-300 sm:text-sm" />
                                @error('date')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-8">
                            <p class="font-serif text-md font-bold text-blue-900">Select a time</p>
                            <div class="mt-4 grid grid-cols-4 gap-2 lg:max-w-xl">
                                @foreach ($timeSlots as $slot => $isBooked)
                                    <button wire:click="selectTime('{{ $slot }}')" type="button"
                                        class="rounded-lg  px-4 py-2 font-medium active:scale-95
                                                           {{ $isBooked ? 'bg-gray-500 text-white' : 'focus:bg-teal-500 focus:text-white bg-teal-100 text-teal-900' }}"
                                        {{ $isBooked ? 'disabled' : '' }}>
                                        {{ $slot }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <div class="flex justify-start">
                            @if (session()->has('message'))
                                <div id="toast-success"
                                    class="flex items-center w-full max-w-sm p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                                    role="alert">
                                    <div
                                        class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                        </svg>
                                        <span class="sr-only">Check icon</span>
                                    </div>
                                    <div class="ms-3 text-sm font-normal">{{ session('message') }}</div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Book Now Button -->
                    <div class="mt-4 flex justify-center items-center">
                        <button wire:click="save" type="button"
                            class="w-30 rounded-full border-8 border-teal-500 bg-teal-600 px-10 py-4 text-lg font-bold text-white transition hover:translate-y-1">
                            Book Now
                        </button>
                    </div>
                    <div class="flex justify-start">
                        @if (session()->has('message'))
                            <div id="toast-success"
                                class="flex items-center w-full max-w-sm p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                                role="alert">
                                <div
                                    class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                    </svg>
                                    <span class="sr-only">Check icon</span>
                                </div>
                                <div class="ms-3 text-sm font-normal">{{ session('message') }}</div>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>