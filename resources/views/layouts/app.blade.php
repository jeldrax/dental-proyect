<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            
            @livewire('navigation-menu')

            @include('layouts.includes.admin.sidebar')

            <div class="p-4 sm:ml-64"> 
                @if (isset($header))
                    <header class="bg-white shadow mb-4 rounded-lg">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>

        @stack('modals')
        @livewireScripts

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            document.addEventListener('livewire:init', () => {
                // 1. Escuchar el evento "confirm-delete" que envías desde el botón
                Livewire.on('confirm-delete', (event) => {
                    
                    // Aseguramos el ID (a veces viene en un objeto)
                    let idToDelete = event.id || event; 

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Sí, eliminarlo',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // 2. Si el usuario dice SÍ, enviamos la orden al componente Livewire
                            Livewire.dispatch('delete-confirmed', { id: idToDelete });
                        }
                    });
                });

                // 3. (Opcional) Escuchar cuando ya se borró para mostrar éxito
                Livewire.on('treatment-deleted', () => {
                    Swal.fire(
                        '¡Eliminado!',
                        'El registro ha sido eliminado.',
                        'success'
                    )
                });
            });
        </script>
        
    </body>
</html>