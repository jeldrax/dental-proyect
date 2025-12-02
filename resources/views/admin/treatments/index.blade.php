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

@push('modals')
    <script>
        document.addEventListener('livewire:initialized', () => {
            
            // 1. Escuchar el evento de "Confirmar Eliminación"
            Livewire.on('confirm-delete', (event) => {
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
                        // 2. Si acepta, llamar al método del componente para borrar
                        // Nota: 'user-table' debe ser el nombre de tu componente si usas el ID por defecto, 
                        // pero como usamos $wire dentro del componente, podemos usar dispatch directo al backend.
                        
                        // La forma más segura en Livewire 3 desde fuera:
                        // Busca el componente Livewire por su nombre (TreatmentTable) y llama al método
                        Livewire.dispatchTo('treatment-table', 'deleteTreatment', { id: event.id });
                    }
                });
            });

            // 3. Escuchar mensaje de éxito (Opcional)
            Livewire.on('swal-success', (message) => {
                Swal.fire(
                    '¡Eliminado!',
                    message,
                    'success'
                )
            });
        });
    </script>
@endpush