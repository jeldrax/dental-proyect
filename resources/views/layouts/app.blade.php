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
                // Listener para el diálogo de confirmación de borrado
                Livewire.on('confirm-delete', (event) => {
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
                            Livewire.dispatch('delete-confirmed', { id: idToDelete });
                        }
                    });
                });

                // Listener para mensajes de éxito
                Livewire.on('show-swal-success', message => {
                    Swal.fire({
                        title: '¡Éxito!',
                        text: message,
                        icon: 'success'
                    });
                });

                // Listener para mensajes de error
                Livewire.on('show-swal-error', message => {
                    Swal.fire({
                        title: 'Error',
                        text: message,
                        icon: 'error'
                    });
                });
            });
        </script>
        
    </body>
</html>