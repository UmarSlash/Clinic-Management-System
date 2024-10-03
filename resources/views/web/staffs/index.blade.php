<!-- resources/views/staffs/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <x-clinic.breadcrumb :items="$breadcrumbs" />
    </x-slot>
    <div class="container mx-auto px-10 py-4">
        <livewire:staffs.tables.staff-table />
    </div>

</x-app-layout>
