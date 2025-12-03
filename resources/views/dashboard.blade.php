<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @hasrole('Admin|Dentista|Recepcionista')
                    <x-welcome />
                @else
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        <x-application-logo class="block h-12 w-auto" />

                        <h1 class="mt-8 text-2xl font-medium text-gray-900">
                            Bienvenido a Dental Proyect
                        </h1>

                        <p class="mt-6 text-gray-500 leading-relaxed">
                            Aquí podrás gestionar tus citas y ver nuestro catálogo de servicios.
                        </p>
                    </div>

                    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                        <div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-tooth text-gray-400 text-2xl"></i>
                                <h2 class="ms-3 text-xl font-semibold text-gray-900">
                                    <a href="{{ route('admin.treatments.index') }}">Catálogo de Tratamientos</a>
                                </h2>
                            </div>
                            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                                Explora los servicios que ofrecemos para el cuidado de tu salud dental.
                            </p>
                        </div>
                    </div>
                @endhasrole
            </div>
        </div>
    </div>
</x-app-layout>
