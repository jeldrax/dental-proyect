<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Tratamiento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <form action="{{ route('admin.treatments.update', $treatment) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="grid grid-cols-1 gap-6">
                        <div>
                            <x-label for="name" value="Nombre del Servicio" />
                            <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name', $treatment->name)" required autofocus />
                        </div>

                        <div>
                            <x-label for="description" value="Descripción" />
                            <textarea name="description" id="description" rows="3" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">{{ old('description', $treatment->description) }}</textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <x-label for="price" value="Precio ($)" />
                                <x-input id="price" class="block w-full mt-1" type="number" step="0.01" name="price" :value="old('price', $treatment->price)" required />
                            </div>

                            <div>
                                <x-label for="duration_minutes" value="Duración (Minutos)" />
                                <x-input id="duration_minutes" class="block w-full mt-1" type="number" name="duration_minutes" :value="old('duration_minutes', $treatment->duration_minutes)" required />
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <a href="{{ route('admin.treatments.index') }}" class="mr-4 text-gray-600 hover:underline">Cancelar</a>
                        <x-button>Actualizar Servicio</x-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>