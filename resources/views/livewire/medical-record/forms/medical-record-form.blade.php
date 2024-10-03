<div class="bg-gray-100 dark:bg-gray-800 transition-colors duration-300">
    <div class="container mx-auto p-4">
        <div class="flex justify-end">
            <x-clinic.flash-success/>
        </div>
        <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Medical Record Information</h1>
            <p class="text-gray-600 dark:text-gray-300 mb-6">Make sure to insert the correct ID for the records</p>
            <form>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>

                        <label for="patient_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Patient</label>
                        <select id="patient_id" wire:model="patient_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a patient</option>
                            @foreach ($patients as $patient)
                                <option value={{ $patient->id }}>{{ $patient->name }}</option>
                            @endforeach
                        </select>
                        @error('patient_id')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="staff_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Staff</label>
                        <select id="staff_id" wire:model="staff_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                    <input type="text" name="billing_id" value="{{ $billing_id }}" disabled>
                    <input type="hidden" name="billing_id" value="{{ $billing_id }}">

                    <input type="text" wire:model="medicine_id" placeholder="Medicine ID"
                        class="border p-2 rounded w-full">
                    @error('medicine_id')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <input type="text" wire:model="dosage" placeholder="Dosage" class="border p-2 rounded w-full">
                    @error('dosage')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror

                    <!-- Date Input with Livewire Binding -->
                    <div class="relative z-0 w-full">
                        <input type="text" wire:model="date" name="date" placeholder="Date"
                            onclick="this.setAttribute('type', 'date');"
                            class="border p-2 rounded w-full bg-transparent focus:outline-none focus:ring-0 focus:border-black" />
                        @error('date')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <button wire:click="save" type="button" class="relative h-12 px-4 py-2 overflow-hidden border border-teal-500 bg-teal-500 text-white font-bold rounded flex items-center transition-all shadow-2xl before:absolute before:right-0 before:top-0 before:h-12 before:w-6 before:translate-x-12 before:rotate-6 before:bg-white before:opacity-10 before:duration-700 hover:bg-teal-700 hover:shadow-teal-500 hover:before:-translate-x-40">
                    <svg class="mr-2 w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                    </svg>
                    <span>{{ __('Add') }}</span>
                </button>
            </form>
        </div>
    </div>
</div>
