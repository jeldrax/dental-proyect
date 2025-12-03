<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo Tratamiento') }}
        </h2>
    </x-slot>

    <x-slot name="breadcrumbs">
        @php
        $breadcrumbs = [
            ['title' => 'Treatments', 'url' => route('admin.treatments.index')],
            ['title' => 'New Treatment', 'url' => '#']
        ];
        @endphp
        <x-breadcrumbs :breadcrumbs="$breadcrumbs" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <form action="{{ route('admin.treatments.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <x-label for="name" value="Nombre del Servicio" />
                            <x-input id="name" class="block w-full mt-1" type="text" name="name" required autofocus />
                        </div>

                        <div>
                            <x-label for="description" value="Descripción (Opcional)" />
                            <textarea name="description" id="description" rows="3" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1"></textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <x-label for="price" value="Precio ($)" />
                                <x-input id="price" class="block w-full mt-1" type="number" step="0.01" name="price" required />
                            </div>

                            <div>
                                <x-label for="duration_minutes" value="Duración (Minutos)" />
                                <x-input id="duration_minutes" class="block w-full mt-1" type="number" name="duration_minutes" value="30" required />
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <a href="{{ route('admin.treatments.index') }}" class="mr-4 text-gray-600 hover:underline">Cancelar</a>
                        <x-button>Guardar Servicio</x-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>