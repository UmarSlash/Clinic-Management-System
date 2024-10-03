<div class="py-4">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
        <div
            class="bg-teal-500 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-teal-600 text-white font-medium group">
            <div
                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                <svg class="w-8 h-8 text-teal-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                        d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                </svg>
            </div>
            <div class="text-right">
                <p class="text-2xl">{{ $patientCount }}</p>
                <p>Patient</p>
            </div>
        </div>
        <div
            class="bg-teal-500 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-teal-600 text-white font-medium group">
            <div
                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                <svg class="w-8 h-8 text-teal-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                        d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </div>
            <div class="text-right">
                <p class="text-2xl">{{ $staffCount }}</p>
                <p>Staff</p>
            </div>
        </div>
        <div
            class="bg-teal-500 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-teal-600 text-white font-medium group">
            <div
                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                <svg class="w-8 h-8 text-teal-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-width="2"
                        d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </div>
            <div class="text-right">
                <p class="text-2xl">{{ $doctorCount }}</p>
                <p>Doctor</p>
            </div>
        </div>
        <div
            class="bg-teal-500 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-teal-600 text-white font-medium group">
            <div
                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                <svg class="w-8 h-8 text-teal-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 9h6m-6 3h6m-6 3h6M6.996 9h.01m-.01 3h.01m-.01 3h.01M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
                </svg>
            </div>
            <div class="text-right">
                <p class="text-2xl">{{ $appointmentCount }}</p>
                <p>Pending Appointment</p>
            </div>
        </div>
    </div>
    <!-- ./Statistics Cards -->
    <!-- { /*variation light set*/ } -->
    <div
        class='flex bg-white shadow-md justify-start md:justify-center rounded-lg overflow-x-scroll mx-auto py-4 px-2 md:mx-12'>

        @foreach ($daysOfWeek as $day)
            <div
                class='flex group {{ $day['isActive'] ? 'bg-teal-300 shadow-lg light-shadow' : 'hover:bg-teal-100 hover:shadow-lg hover-light-shadow' }} rounded-lg mx-1 transition-all duration-300 cursor-pointer justify-center w-16'>
                <div class='flex items-center px-4 py-4'>
                    <div class='text-center'>
                        <p
                            class='{{ $day['isActive'] ? 'text-teal-900' : 'text-gray-900 group-hover:text-teal-900' }} text-sm transition-all duration-300'>
                            {{ $day['name'] }}</p>
                        <p
                            class='{{ $day['isActive'] ? 'text-teal-900 font-bold' : 'text-gray-900 group-hover:text-teal-900 group-hover:font-bold' }} mt-3 transition-all duration-300'>
                            {{ $day['number'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <div class="max-w-md mx-auto text-center py-4">
        <h2 class="text-2xl font-bold text-blue-900">Appointments Today</h2>
        <p class="text-sm text-gray-500">Here are the list of appointments for today.</p>
    </div>
    @foreach ($appointments as $app)
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl m-3">
            <div class="md:flex">
                <div class="p-8">
                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Patient:
                        {{ $app->patient->name }}</div>
                    <p class="block mt-1 text-lg leading-tight font-medium text-black">Appointment Time:
                        {{ $app->time }}
                    </p>
                    <p class="mt-2 text-gray-500">Doctor: Dr. {{ $app->doctor->name }}</p>
                    <button wire:click="redirectToAppointmentTable"
                        class="mt-5 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        View Details
                    </button>
                </div>
            </div>
        </div>
    @endforeach
</div>
