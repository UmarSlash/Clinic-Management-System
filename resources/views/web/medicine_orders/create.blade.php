<!-- resources/views/medicine-orders/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <x-clinic.breadcrumb :items="$breadcrumbs" />
    </x-slot>
    <div class="container mx-auto px-10 py-4">
        <livewire:medicine-order.forms.medicine-order-form />
    </div>

</x-app-layout>