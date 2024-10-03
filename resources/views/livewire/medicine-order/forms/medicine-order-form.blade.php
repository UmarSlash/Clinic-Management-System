<div class="bg-gray-100 dark:bg-gray-800 transition-colors duration-300">
    <div class="container mx-auto p-4">
        <div class="flex justify-end">
            <x-clinic.flash-success/>
        </div>
        <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Order Medicine</h1>
            <p class="text-gray-600 dark:text-gray-300 mb-6">Make sure to insert the correct ID for the orders</p>
            <form>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>

                        <label for="medicine_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Medicine</label>
                        <select id="medicine_id" wire:model="medicine_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                            <option selected>Choose a Medicine</option>
                            @foreach ($medicines as $medicine)
                                <option value={{ $medicine->id }}>{{ $medicine->name }}</option>
                            @endforeach
                        </select>
                        @error('medicine_id')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="staff_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Staff</label>
                        <select id="staff_id" wire:model="staff_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                            <option selected>Choose a staff</option>
                            @foreach ($staffs as $staff)
                                <option value={{ $staff->id }}>{{ $staff->name }}</option>
                            @endforeach
                        </select>
                        @error('staff_id')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <input type="text" wire:model="quantity" placeholder="Quantity" class="border p-2 rounded w-full">
                    @error('quantity')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror

                    <!-- Order Date Input with Livewire Binding -->
                    <div class="relative z-0 w-full">
                        <input type="text" wire:model="order_date" name="order_date" placeholder="Date"
                            onclick="this.setAttribute('type', 'date');"
                            class="border p-2 rounded w-full bg-transparent focus:outline-none focus:ring-0 focus:border-black" />
                        @error('order_date')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <button type="button" wire:click="save"
                    class="text-white inline-flex items-center bg-teal-500 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                    <svg class="mr-2 w-6 h-6 text-white dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                    Add
                </button>
            </form>
        </div>
    </div>
</div>
