<div x-data="{ current: 0 }" class="relative">
    <div class="overflow-hidden">
        <div class="flex transition-transform duration-300" :style="'transform: translateX(-' + current * 50 + '%)'">
            @foreach ($doctor->chunk(2) as $chunk)
                <div class="min-w-full flex-shrink-0 flex">
                    @foreach ($chunk as $doc)
                        <div class="w-1/2 p-2">
                            <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
                                <img src="{{ $doc->profile_photo_url }}" alt="{{ $doc->name }}" class="py-4 px-4 rounded-full h-36 w-36 object-cover">
                                <div class="p-6 flex-grow">
                                    <div class="text-teal-600 font-semibold text-lg mb-2">Dr. {{ $doc->name }}</div>
                                    <div class="text-gray-600 text-md mb-4">Specialty: {{ $doc->specialty }}</div>
                                    <ul class="flex-grow">
                                        <li class="mb-4">Available Slots Today:</li>
                                        @if (empty($availableSlot[$doc->id]))
                                            <li class="py-2 px-4 bg-gray-100 text-gray-500 rounded-md shadow-sm mb-2">No
                                                available slots</li>
                                        @endif
                                        @foreach ($availableSlot[$doc->id] ?? [] as $slot => $isBooked)
                                            <li
                                                class="py-2 px-4 bg-teal-100 text-teal-600 rounded-md shadow-sm mb-2 {{ $isBooked ? 'hidden' : 'block' }}">
                                                {{ $slot }} -
                                                {{ \Carbon\Carbon::parse($slot)->addHour()->format('H:i') }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="p-4 bg-gray-100 rounded-b-lg">
                                    <button wire:click="book({{ $doc->id }})"
                                        class="w-full px-4 py-2 bg-teal-600 text-white rounded-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">Book
                                        Appointment</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    <div class="absolute inset-y-0 left-0 flex items-center justify-center z-20">
        <button @click="current = (current > 0) ? current - 1 : {{ ceil($doctor->count() / 2) }}"
            class="bg-white bg-opacity-75 rounded-full p-2">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
    </div>
    <div class="absolute inset-y-0 right-0 flex items-center justify-center z-20">
        <button @click="current = (current < {{ ceil($doctor->count() / 2)}}) ? current + 1 : 0"
            class="bg-white bg-opacity-75 rounded-full p-2">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>
</div>
