<!-- resources/views/medical-records/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <x-clinic.breadcrumb :items="$breadcrumbs" />
    </x-slot>
    <div class="container mx-auto px-10 py-4">
        <livewire:medical-record.forms.medical-record-form :medical="$medical"/>
    </div>

</x-app-layout>