<div>
    <div class="{{ !$showModel ? 'hidden' : 'block' }} fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center"
        wire:key="billing-{{ $showModel }}">
        <div class="relative p-4 w-full max-w-lg max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $billing->exists ? 'Edit Billing' : 'Add Billing' }}
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
                                <input wire:model="amount" type="text" id="amount" aria-describedby="amount_help"
                                    class="block px-4 pb-4 pt-6 w-full text-md text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white peer
                                    dark:border-gray-500 border-gray-600 dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600"
                                    placeholder=" " autofocus />
                                <label for="amount"
                                    class="absolute text-md duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                                    {{ __('amount') }}
                                </label>
                            </div>
                            @error('amount')
                                <p id="amount_help"
                                    class="mt-2 text-xs text-red-600 dark:text-red-400"> {{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <div class="relative">
                                <input wire:model="status" type="text" id="status" aria-describedby="status_help"
                                    class="block px-4 pb-4 pt-6 w-full text-md text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white peer
                                    dark:border-gray-500 border-gray-600 dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600"
                                    placeholder=" " autofocus />
                                <label for="status"
                                    class="absolute text-md duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                                    {{ __('status') }}
                                </label>
                            </div>
                            @error('status')
                                <p id="status_help"
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
                            class="text-white inline-flex items-center bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            @if ($billing->exists)
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
                            {{ $billing->exists ? 'Save' : 'Add' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
