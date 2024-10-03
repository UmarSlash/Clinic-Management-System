<!-- resources/views/staffs/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        {{ __('Staff List') }}
    </x-slot>
    <div class="container mx-auto px-8 py-4">
        <livewire:staffs.forms.staff-form />
    </div>

</x-app-layout>
