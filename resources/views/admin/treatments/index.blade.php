<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Tratamientos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <div class="flex justify-between mb-4">
                    <h1 class="text-2xl font-bold">Catálogo de Servicios</h1>
                    
                    @role('Admin')
                        <a href="{{ route('admin.treatments.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            + Nuevo Servicio
                        </a>
                    @endrole
                </div>

                <livewire:treatment-table />
                
            </div>
        </div>
    </div>
</x-app-layout>