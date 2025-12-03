<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Usuarios') }}
        </h2>
    </x-slot>

    <x-slot name="breadcrumbs">
        @php
        $breadcrumbs = [
            ['title' => 'Users', 'url' => route('admin.users.index')]
        ];
        @endphp
        <x-breadcrumbs :breadcrumbs="$breadcrumbs" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('user-table')
            </div>
        </div>
    </div>
</x-app-layout>
