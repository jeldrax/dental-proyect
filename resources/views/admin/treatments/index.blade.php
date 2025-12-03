<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Catálogo de Tratamientos') }}
            </h2>
            @can('admin.treatments.create')
                <x-button onclick="Livewire.dispatch('createTreatment')">
                    Crear Tratamiento
                </x-button>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('treatment-table')
            </div>
        </div>
    </div>

    @livewire('treatment-form-modal')
</x-app-layout>
