<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-slot name="breadcrumbs">
        @php
        $breadcrumbs = [
            ['title' => 'Dashboard', 'url' => route('dashboard')]
        ];
        @endphp
        <x-breadcrumbs :breadcrumbs="$breadcrumbs" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                {{-- LÓGICA DE ROLES --}}
                @hasrole('Admin|Dentista|Recepcionista')
                    {{-- VISTA PARA EL PERSONAL (ADMIN, DENTISTA, ETC) --}}
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        
                        
                        <h1 class="mt-8 text-2xl font-medium text-gray-900">
                            Panel de Administración
                        </h1>
                        <p class="mt-6 text-gray-500">
                            Bienvenido al sistema de gestión interna.
                        </p>
                    </div>
                    
                    {{-- Aquí puedes poner tus botones de admin --}}
                    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                        <div>
                             <div class="flex items-center">
                                <i class="fa-solid fa-users-gear text-gray-400 text-2xl"></i>
                                <h2 class="ms-3 text-xl font-semibold text-gray-900">
                                    <a href="{{ route('admin.users.index') }}">Gestionar Usuarios</a>
                                </h2>
                            </div>
                        </div>
                         <div>
                             <div class="flex items-center">
                                <i class="fa-solid fa-tooth text-gray-400 text-2xl"></i>
                                <h2 class="ms-3 text-xl font-semibold text-gray-900">
                                    <a href="{{ route('admin.treatments.index') }}">Catálogo de Tratamientos</a>
                                </h2>
                            </div>
                        </div>
                    </div>

                @else
                    {{-- VISTA PARA EL PACIENTE (Tu código original) --}}
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
                                    {{-- Asegúrate que esta ruta exista o cámbiala por '#' si aun no la creas --}}
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