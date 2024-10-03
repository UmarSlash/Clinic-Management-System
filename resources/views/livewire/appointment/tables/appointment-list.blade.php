<div class="container mx-auto">
    @hasanyrole([config('system.roles.doctor'), config('system.roles.admin')])
        <!-- component -->
        <!-- This is an example component -->
        <div class='flex sm:flex-row space-y-2 sm:space-x-2 flex-row w-full justify-center mb-10'>
            @if ($total > 0)
                <div class='flex flex-wrap flex-row justify-center items-center w-full sm:w-1/4 p-1 bg-white rounded-md shadow-xl border-l-4 border-blue-300'>
                    <div class="flex justify-between w-full">
                        <div>
                            <div class="p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="flex items-center text-xs px-3 bg-blue-200 text-blue-800 rounded-full">
                                {{ ($total / $total) * 100 }}%
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="font-bold text-5xl">
                            {{ $total }}
                        </div>
                        <div class="font-bold text-sm">
                            Total
                        </div>
                    </div>
                </div>
                <div class='flex flex-wrap flex-row justify-center items-center w-full sm:w-1/4 p-1 bg-white rounded-md shadow-xl border-l-4 border-yellow-300'>
                    <div class="flex justify-between w-full">
                        <div>
                            <div class="p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="flex items-center text-xs px-3 bg-yellow-200 text-yellow-800 rounded-full">
                                {{ number_format(($pending / $total) * 100, 2) }}%
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="font-bold text-5xl text-center">
                            {{ $pending }}
                        </div>
                        <div class="font-bold text-sm">
                            In Progress
                        </div>
                    </div>
                </div>
                <div class='flex flex-wrap flex-row justify-center items-center w-full sm:w-1/4 p-1 bg-white rounded-md shadow-xl border-l-4 border-red-300'>
                    <div class="flex justify-between w-full">
                        <div>
                            <div class="p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="flex items-center text-xs px-3 bg-red-200 text-red-800 rounded-full">
                                {{ number_format(($reject / $total) * 100, 2) }}%
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="font-bold text-5xl text-center">
                            {{ $reject }}
                        </div>
                        <div class="font-bold text-sm">
                            Reject
                        </div>
                    </div>
                </div>
                <div class='flex flex-wrap flex-row justify-center items-center w-full sm:w-1/4 p-1 bg-white rounded-md shadow-xl border-l-4 border-green-300'>
                    <div class="flex justify-between w-full">
                        <div>
                            <div class="p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="flex items-center text-xs px-3 bg-green-200 text-green-800 rounded-full">
                                {{ number_format(($approve / $total) * 100, 2) }}%
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="font-bold text-5xl text-center">
                            {{ $approve }}
                        </div>
                        <div class="font-bold text-sm">
                            Approve
                        </div>
                    </div>
                </div>
            @else
                <div class="text-red-500 font-bold">No data available.</div>
            @endif
        </div>        
    @endhasanyrole
    <div class="flex justify-between items-center mb-5">
        @hasanyrole([config('system.roles.doctor'), config('system.roles.admin')])
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
        @endhasanyrole
        @hasanyrole(config('system.roles.patient'))
            <div class="flex justify-center">
                <button wire:click="add"
                    class="relative h-12 px-4 py-2 overflow-hidden border border-teal-500 bg-teal-500 text-white font-bold rounded flex items-center transition-all shadow-2xl before:absolute before:right-0 before:top-0 before:h-12 before:w-6 before:translate-x-12 before:rotate-6 before:bg-white before:opacity-10 before:duration-700 hover:bg-teal-700 hover:shadow-teal-500 hover:before:-translate-x-40">
                    <svg class="mr-2 w-6 h-6 text-white dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                    <span>{{ __('Book Appointment') }}</span>
                </button>
            </div>
        @endhasanyrole
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Doctor
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Patient
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Description</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                    </th>
                    @hasanyrole([config('system.roles.doctor'), config('system.roles.admin')])
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action
                    </th>
                    @endhasanyrole
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($appointment as $app)
                    <tr class="hover:bg-gray-100 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $app->doctor->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $app->patient->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $app->date }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $app->time }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $app->description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="inline-block px-2 py-1 rounded-lg
                                @if ($app->status == 'Approved') bg-green-200 text-gray-700
                                @elseif($app->status == 'Rejected') bg-red-200 text-gray-700
                                @elseif($app->status == 'Pending') bg-yellow-200 text-gray-700 @endif">
                                {{ $app->status }}
                            </span>
                        </td>
                        @hasanyrole([config('system.roles.doctor'), config('system.roles.admin')])
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex space-x-2">
                                    <button wire:click="approveAppointment({{ $app->id }})">
                                        <svg class="fill-green-500" version="1.1" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            x="0px" y="0px" width="30px" height="30px" viewBox="0 0 122.881 122.88"
                                            enable-background="new 0 0 122.881 122.88" xml:space="preserve">
                                            <g>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M61.44,0c33.933,0,61.441,27.507,61.441,61.439 c0,33.933-27.508,61.44-61.441,61.44C27.508,122.88,0,95.372,0,61.439C0,27.507,27.508,0,61.44,0L61.44,0z M34.106,67.678 l-0.015-0.014c-0.785-0.718-1.207-1.685-1.256-2.669c-0.049-0.982,0.275-1.985,0.984-2.777c0.01-0.011,0.019-0.021,0.029-0.031 c0.717-0.784,1.684-1.207,2.668-1.256c0.989-0.049,1.998,0.28,2.792,0.998l12.956,11.748l31.089-32.559v0 c0.74-0.776,1.723-1.18,2.719-1.204c0.992-0.025,1.994,0.329,2.771,1.067v0.001c0.777,0.739,1.18,1.724,1.205,2.718 c0.025,0.993-0.33,1.997-1.068,2.773L55.279,81.769c-0.023,0.024-0.048,0.047-0.073,0.067c-0.715,0.715-1.649,1.095-2.598,1.13 c-0.974,0.037-1.963-0.293-2.744-1L34.118,67.688L34.106,67.678L34.106,67.678L34.106,67.678z" />
                                            </g>
                                        </svg>
                                    </button>
                                    <button wire:click="rejectAppointment({{ $app->id }})">
                                        <svg class="fill-red-500" version="1.1" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="30px" height="30px" viewBox="0 0 122.881 122.88"
                                            enable-background="new 0 0 122.881 122.88" xml:space="preserve">
                                            <g>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M61.44,0c33.933,0,61.441,27.507,61.441,61.439 c0,33.933-27.508,61.44-61.441,61.44C27.508,122.88,0,95.372,0,61.439C0,27.507,27.508,0,61.44,0L61.44,0z M81.719,36.226 c1.363-1.363,3.572-1.363,4.936,0c1.363,1.363,1.363,3.573,0,4.936L66.375,61.439l20.279,20.278c1.363,1.363,1.363,3.573,0,4.937 c-1.363,1.362-3.572,1.362-4.936,0L61.44,66.376L41.162,86.654c-1.362,1.362-3.573,1.362-4.936,0c-1.363-1.363-1.363-3.573,0-4.937 l20.278-20.278L36.226,41.162c-1.363-1.363-1.363-3.573,0-4.936c1.363-1.363,3.573-1.363,4.936,0L61.44,56.504L81.719,36.226 L81.719,36.226z" />
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        @endhasanyrole
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
