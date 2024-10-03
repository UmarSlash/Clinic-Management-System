<!-- resources/views/managements/user_edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <x-clinic.breadcrumb :items="$breadcrumbs" />
    </x-slot>
    <div class="container mx-auto px-10 py-4">
        <livewire:management.forms.user-form :user="$user"/>
    </div>
</x-app-layout>
