<div class="flex flex-col w-64 bg-teal-500 text-white shadow-lg fixed h-full overflow-y-auto">
    <!-- Logo -->
    <div class="shrink-0 flex items-center p-4 bg-teal-500">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('images/Revive-Logo-NoBG.png') }}" class="block h-20 w-auto" alt="Logo">
        </a>
    </div>

    <!-- Navigation Links -->
    <div class="flex flex-col mt-4">
        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="flex items-center p-3 hover:bg-teal-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="h-6 w-6 mr-4 text-white">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            {{ __('Dashboard') }}
        </x-nav-link>

        @hasanyrole([config('system.roles.admin'), config('system.roles.patient')])
            @php
                $canTogglePatients = true;
            @endphp
        @else
            @php
                $canTogglePatients = false;
            @endphp
        @endhasanyrole

        <!-- Patients Section -->
        <li class="relative px-2 py-1" x-data="{ open: false }">
            <div @if ($canTogglePatients) x-on:click="open = !open" @endif
                class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500 hover:text-yellow-400 cursor-pointer">
                <span class="inline-flex items-center text-sm font-semibold text-white hover:text-teal-700">
                    <svg class="w-6 h-6" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                    </svg>
                    <span class="ml-4">{{ __('Patients') }}</span>
                </span>
                @if ($canTogglePatients)
                    <svg xmlns="http://www.w3.org/2000/svg" x-show="!open" class="ml-1 text-white w-4 h-4"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" x-show="open" class="ml-1 text-white w-4 h-4"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                @endif
            </div>
            <div x-show="open" x-transition:enter="transition-all ease-out duration-300"
                x-transition:enter-start="max-height-0 transform -translate-y-2 opacity-0"
                x-transition:enter-end="max-height-xl transform translate-y-0 opacity-100"
                x-transition:leave="transition-all ease-in duration-300"
                x-transition:leave-start="max-height-xl transform translate-y-0 opacity-100"
                x-transition:leave-end="max-height-0 transform -translate-y-2 opacity-0" class="overflow-hidden"
                style="display:none;">
                <ul class="p-2 mt-2 space-y-2 text-sm font-medium rounded-md shadow-inner bg-teal-700"
                    aria-label="submenu">
                    <li class="pl-8">
                        <x-nav-link href="{{ route('patient.index') }}" :active="request()->routeIs('patient.index')"
                            class="flex items-center p-2 hover:bg-teal-700">
                            Patient List
                        </x-nav-link>
                    </li>
                    <li class="pl-8">
                        <x-nav-link href="{{ route('appointment.index') }}" :active="request()->routeIs('appointment.index')"
                            class="flex items-center p-2 hover:bg-teal-700">
                            View Appointment
                        </x-nav-link>
                    </li>
                    <li class="pl-8">
                        <x-nav-link href="{{ route('appointment.create') }}" :active="request()->routeIs('appointment.create')"
                            class="flex items-center p-2 hover:bg-teal-700">
                            Make Appointment
                        </x-nav-link>
                    </li>
                    <li class="pl-8">
                        <x-nav-link href="{{ route('medical_record.index') }}" :active="request()->routeIs('medical_record.index')"
                            class="flex items-center p-2 hover:bg-teal-700">
                            View Medical Record
                        </x-nav-link>
                    </li>
                    {{-- <li class="pl-8">
                        <x-nav-link href="{{ route('billing.index') }}" :active="request()->routeIs('billing.index')"
                            class="flex items-center p-2 hover:bg-teal-700">
                            Make Payment
                        </x-nav-link>
                    </li> --}}
                </ul>
            </div>
        </li>

        @hasanyrole([config('system.roles.admin'), config('system.roles.staff')])
            @php
                $canToggle = true;
            @endphp
        @else
            @php
                $canToggle = false;
            @endphp
        @endhasanyrole

        <!-- Staffs Section -->
        <li class="relative px-2 py-1" x-data="{ open: false }">
            <div @if ($canToggle) x-on:click="open = !open" @endif
                class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500 hover:text-yellow-400 cursor-pointer">
                <span class="inline-flex items-center text-sm font-semibold text-white hover:text-teal-700">
                    <svg class="w-6 h-6" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <span class="ml-4">{{ __('Staffs') }}</span>
                </span>
                @if ($canToggle)
                    <svg xmlns="http://www.w3.org/2000/svg" x-show="!open" class="ml-1 text-white w-4 h-4"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" x-show="open" class="ml-1 text-white w-4 h-4"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                @endif
            </div>
            <div x-show="open" x-transition:enter="transition-all ease-out duration-300"
                x-transition:enter-start="max-height-0 transform -translate-y-2 opacity-0"
                x-transition:enter-end="max-height-xl transform translate-y-0 opacity-100"
                x-transition:leave="transition-all ease-in duration-300"
                x-transition:leave-start="max-height-xl transform translate-y-0 opacity-100"
                x-transition:leave-end="max-height-0 transform -translate-y-2 opacity-0" class="overflow-hidden"
                style="display:none;">
                <ul class="p-2 mt-2 space-y-2 text-sm font-medium rounded-md shadow-inner bg-teal-700"
                    aria-label="submenu">
                    <li class="pl-8">
                        <x-nav-link href="{{ route('staff.index') }}" :active="request()->routeIs('staff.index')"
                            class="flex items-center p-2 hover:bg-teal-700">
                            Staff List
                        </x-nav-link>
                    </li>
                    <li class="pl-8">
                        <x-nav-link href="{{ route('medical_record.index') }}" :active="request()->routeIs('medical_record.index')"
                            class="flex items-center p-2 hover:bg-teal-700">
                            View Medical Record
                        </x-nav-link>
                    </li>
                    <li class="pl-8">
                        <x-nav-link href="{{ route('medical_record.create') }}" :active="request()->routeIs('medical_record.create')"
                            class="flex items-center p-2 hover:bg-teal-700">
                            Record Medical
                        </x-nav-link>
                    </li>
                    <li class="pl-8">
                        <x-nav-link href="{{ route('billing.index') }}" :active="request()->routeIs('billing.index')"
                            class="flex items-center p-2 hover:bg-teal-700">
                            View Billing
                        </x-nav-link>
                    </li>
                    {{-- <li class="pl-8">
                        <x-nav-link href="{{ route('billing.index') }}" :active="request()->routeIs('billing.index')"
                            class="flex items-center p-2 hover:bg-teal-700">
                            Generate Billing
                        </x-nav-link>
                    </li> --}}
                </ul>
            </div>
        </li>

        @hasanyrole([config('system.roles.admin'), config('system.roles.doctor')])
            @php
                $canToggleDoctors = true;
            @endphp
        @else
            @php
                $canToggleDoctors = false;
            @endphp
        @endhasanyrole

        <!-- Doctors Section -->
        <li class="relative px-2 py-1" x-data="{ open: false }">
            <div @if ($canToggleDoctors) x-on:click="open = !open" @endif
                class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500 hover:text-yellow-400 cursor-pointer">
                <span class="inline-flex items-center text-sm font-semibold text-white hover:text-teal-700">
                    <svg class="w-6 h-6" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2"
                            d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <span class="ml-4">{{ __('Doctors') }}</span>
                </span>
                @if ($canToggleDoctors)
                    <svg xmlns="http://www.w3.org/2000/svg" x-show="!open" class="ml-1 text-white w-4 h-4"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" x-show="open" class="ml-1 text-white w-4 h-4"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                @endif
            </div>
            <div x-show="open" x-transition:enter="transition-all ease-out duration-300"
                x-transition:enter-start="max-height-0 transform -translate-y-2 opacity-0"
                x-transition:enter-end="max-height-xl transform translate-y-0 opacity-100"
                x-transition:leave="transition-all ease-in duration-300"
                x-transition:leave-start="max-height-xl transform translate-y-0 opacity-100"
                x-transition:leave-end="max-height-0 transform -translate-y-2 opacity-0" class="overflow-hidden"
                style="display:none;">
                <ul class="p-2 mt-2 space-y-2 text-sm font-medium rounded-md shadow-inner bg-teal-700"
                    aria-label="submenu">
                    <li class="pl-8">
                        <x-nav-link href="{{ route('doctor.index') }}" :active="request()->routeIs('doctor.index')"
                            class="flex items-center p-2 hover:bg-teal-700">
                            Doctor List
                        </x-nav-link>
                    </li>
                    <li class="pl-8">
                        <x-nav-link href="{{ route('appointment.index') }}" :active="request()->routeIs('appointment.index')"
                            class="flex items-center p-2 hover:bg-teal-700">
                            View Appointment
                        </x-nav-link>
                    </li>
                </ul>
            </div>
        </li>

        @hasanyrole([config('system.roles.admin'), config('system.roles.staff')])
            @php
                $canToggleMedicines = true;
            @endphp
        @else
            @php
                $canToggleMedicines = false;
            @endphp
        @endhasanyrole

        <!-- Medicine Section -->
        <li class="relative px-2 py-1" x-data="{ open: false }">
            <div @if ($canToggleMedicines) x-on:click="open = !open" @endif
                class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500 hover:text-yellow-400 cursor-pointer">
                <span class="inline-flex items-center text-sm font-semibold text-white hover:text-teal-700">
                    <svg class="w-6 h-6" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 12c.263 0 .524-.06.767-.175a2 2 0 0 0 .65-.491c.186-.21.333-.46.433-.734.1-.274.15-.568.15-.864a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 12 9.736a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 16 9.736c0 .295.052.588.152.861s.248.521.434.73a2 2 0 0 0 .649.488 1.809 1.809 0 0 0 1.53 0 2.03 2.03 0 0 0 .65-.488c.185-.209.332-.457.433-.73.1-.273.152-.566.152-.861 0-.974-1.108-3.85-1.618-5.121A.983.983 0 0 0 17.466 4H6.456a.986.986 0 0 0-.93.645C5.045 5.962 4 8.905 4 9.736c.023.59.241 1.148.611 1.567.37.418.865.667 1.389.697Zm0 0c.328 0 .651-.091.94-.266A2.1 2.1 0 0 0 7.66 11h.681a2.1 2.1 0 0 0 .718.734c.29.175.613.266.942.266.328 0 .651-.091.94-.266.29-.174.537-.427.719-.734h.681a2.1 2.1 0 0 0 .719.734c.289.175.612.266.94.266.329 0 .652-.091.942-.266.29-.174.536-.427.718-.734h.681c.183.307.43.56.719.734.29.174.613.266.941.266a1.819 1.819 0 0 0 1.06-.351M6 12a1.766 1.766 0 0 1-1.163-.476M5 12v7a1 1 0 0 0 1 1h2v-5h3v5h7a1 1 0 0 0 1-1v-7m-5 3v2h2v-2h-2Z" />
                    </svg>
                    <span class="ml-4">{{ __('Medicines') }}</span>
                </span>
                @if ($canToggleMedicines)
                    <svg xmlns="http://www.w3.org/2000/svg" x-show="!open" class="ml-1 text-white w-4 h-4"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" x-show="open" class="ml-1 text-white w-4 h-4"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                @endif
            </div>
            <div x-show="open" x-transition:enter="transition-all ease-out duration-300"
                x-transition:enter-start="max-height-0 transform -translate-y-2 opacity-0"
                x-transition:enter-end="max-height-xl transform translate-y-0 opacity-100"
                x-transition:leave="transition-all ease-in duration-300"
                x-transition:leave-start="max-height-xl transform translate-y-0 opacity-100"
                x-transition:leave-end="max-height-0 transform -translate-y-2 opacity-0" class="overflow-hidden"
                style="display:none;">
                <ul class="p-2 mt-2 space-y-2 text-sm font-medium rounded-md shadow-inner bg-teal-700"
                    aria-label="submenu">
                    <li class="pl-8">
                        <x-nav-link href="{{ route('medicine.index') }}" :active="request()->routeIs('medicine.index')"
                            class="flex items-center p-2 hover:bg-teal-700">
                            Medicine List
                        </x-nav-link>
                    </li>
                    <li class="pl-8">
                        <x-nav-link href="{{ route('medicine_order.index') }}" :active="request()->routeIs('medicine_order.index')"
                            class="flex items-center p-2 hover:bg-teal-700">
                            Order List
                        </x-nav-link>
                    </li>
                    <li class="pl-8">
                        <x-nav-link href="{{ route('medicine_order.create') }}" :active="request()->routeIs('medicine_order.create')"
                            class="flex items-center p-2 hover:bg-teal-700">
                            Make Order
                        </x-nav-link>
                    </li>
                </ul>
            </div>
        </li>

        @hasanyrole(config('system.roles.admin'))
            @php
                $canToggleManagement = true;
            @endphp
        @else
            @php
                $canToggleManagement = false;
            @endphp
        @endhasanyrole

        @hasanyrole(config('system.roles.admin'))
            <!-- Management Section -->
            <li class="relative px-2 py-1" x-data="{ open: false }">
                <div @if ($canToggleManagement) x-on:click="open = !open" @endif
                    class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500 hover:text-yellow-400 cursor-pointer">
                    <span class="inline-flex items-center text-sm font-semibold text-white hover:text-teal-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <span class="ml-4">{{ __('Management') }}</span>
                    </span>
                    @if ($canToggleManagement)
                        <svg xmlns="http://www.w3.org/2000/svg" x-show="!open" class="ml-1 text-white w-4 h-4"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" x-show="open" class="ml-1 text-white w-4 h-4"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    @endif
                </div>
                <div x-show="open" x-transition:enter="transition-all ease-out duration-300"
                    x-transition:enter-start="max-height-0 transform -translate-y-2 opacity-0"
                    x-transition:enter-end="max-height-xl transform translate-y-0 opacity-100"
                    x-transition:leave="transition-all ease-in duration-300"
                    x-transition:leave-start="max-height-xl transform translate-y-0 opacity-100"
                    x-transition:leave-end="max-height-0 transform -translate-y-2 opacity-0" class="overflow-hidden"
                    style="display:none;">
                    <ul class="p-2 mt-2 space-y-2 text-sm font-medium rounded-md shadow-inner bg-teal-700"
                        aria-label="submenu">
                        <li class="pl-8">
                            <x-nav-link href="{{ route('management.user_index') }}" :active="request()->routeIs('management.user_index')"
                                class="flex items-center p-2 hover:bg-teal-700">
                                User Management
                            </x-nav-link>
                        </li>
                        {{-- <li class="pl-8">
                            <x-nav-link href="{{ route('medicine_order.index') }}" :active="request()->routeIs('medicine_order.index')"
                                class="flex items-center p-2 hover:bg-teal-700">
                                Role Management
                            </x-nav-link>
                        </li>
                        <li class="pl-8">
                            <x-nav-link href="{{ route('medicine_order.create') }}" :active="request()->routeIs('medicine_order.create')"
                                class="flex items-center p-2 hover:bg-teal-700">
                                Management
                            </x-nav-link>
                        </li> --}}
                    </ul>
                </div>
            </li>
        @endhasanyrole
    </div>
</div>
