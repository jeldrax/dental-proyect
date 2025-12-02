<div class="flex space-x-2">
    {{-- Botón Editar --}}
    <a href="{{ route('admin.treatments.edit', $treatment) }}" class="text-blue-500 hover:underline">
        <i class="fa-solid fa-pen"></i> Editar
    </a>

    {{-- Botón Eliminar (Solo Admin) --}}
    @role('Admin')
        <button
            wire:click="$dispatch('confirm-delete', { id: {{ $treatment->id }} })"
            class="text-red-500 hover:underline ml-2">
            <i class="fa-solid fa-trash"></i> Eliminar
        </button>
    @endrole
</div>