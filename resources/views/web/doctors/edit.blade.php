<!-- resources/views/doctors/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <x-clinic.breadcrumb :items="$breadcrumbs" />
    </x-slot>
    <div class="container mx-auto px-10 py-4">
        <livewire:doctors.forms.doctor-form :doctor="$doctor" />
    </div>
</x-app-layout>

