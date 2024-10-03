<div class="container mx-auto">
    <div class="flex justify-between items-center mb-5">
        <div class="flex items-center w-full md:w-auto">
            <input wire:model.live="search"
                class="w-full md:w-64 border-none bg-white shadow-md px-4 py-2 text-black-400 outline-none focus:outline-none"
                type="search" name="search" placeholder="Search..." />
            <button type="submit"
                class="m-2 rounded bg-teal-600 px-4 py-2 text-white hover:bg-teal-700 transition duration-300">
                <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/1999/xlink" viewBox="0 0 56.966 56.966"
                    xml:space="preserve" width="512px" height="512px">
                    <path
                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                </svg>
            </button>
        </div>
        @hasanyrole([config('system.roles.staff'), config('system.roles.admin')])
            <div class="flex justify-center">
                <button wire:click="add"
                    class="relative h-12 px-4 py-2 overflow-hidden border border-teal-500 bg-teal-500 text-white font-bold rounded flex items-center transition-all shadow-2xl before:absolute before:right-0 before:top-0 before:h-12 before:w-6 before:translate-x-12 before:rotate-6 before:bg-white before:opacity-10 before:duration-700 hover:bg-teal-700 hover:shadow-teal-500 hover:before:-translate-x-40">
                    <svg class="mr-2 w-6 h-6 text-white dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                    <span>{{ __('Add Record') }}</span>
                </button>
            </div>
        @endhasanyrole
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow-md p-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Patient
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Staff
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Billing
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Medicine
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dosage
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($medical_record as $mr)
                    <tr class="hover:bg-gray-100 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $mr->patient->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $mr->staff->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $mr->billing->amount }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $mr->medicine->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $mr->dosage }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $mr->date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
