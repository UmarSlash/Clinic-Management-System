<!-- resources/views/medicines/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <x-clinic.breadcrumb :items="$breadcrumbs" />
    </x-slot>
    <div class="container mx-auto px-10 py-4">
        <livewire:medicines.tables.medicine-table />
        <livewire:medicines.forms.medicine-form />
    </div>

</x-app-layout>
