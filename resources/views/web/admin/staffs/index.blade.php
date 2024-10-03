<!-- resources/views/staffs/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        {{ __('Staff List') }}
    </x-slot>

    <div class="px-10 py-4">
        {{-- <a class="bg-blue-500 text-white rounded-xl shadow py-2 px-4" href="{{ route('staff.create') }}">Create Staff</a> --}}
        <livewire:staffs.tables.staff-table />
    </div>

</x-app-layout>
