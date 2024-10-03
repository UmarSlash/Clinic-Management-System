<!-- resources/views/billings/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <x-clinic.breadcrumb :items="$breadcrumbs" />
    </x-slot>
    <div class="container mx-auto px-10 py-4">
        <livewire:billings.tables.billing-table />
        <livewire:billings.forms.billing-form />
    </div>

</x-app-layout>
