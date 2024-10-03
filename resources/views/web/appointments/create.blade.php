<!-- resources/views/appointments/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <x-clinic.breadcrumb :items="$breadcrumbs" />
    </x-slot>
    <div class="container mx-auto px-10 py-4">
        <livewire:appointment.tables.appointment-table />
        <livewire:appointment.forms.appointment-form />
    </div>

</x-app-layout>