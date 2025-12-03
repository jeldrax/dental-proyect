<div class="flex items-center space-x-2">
    @can('admin.treatments.edit')
        <button wire:click="$dispatch('edit-treatment', { id: {{ $treatment->id }} })" class="text-indigo-600 hover:text-indigo-900">
            <i class="fa-solid fa-pen-to-square"></i>
        </button>
    @endcan

    @can('admin.treatments.delete')
        <button wire:click="$dispatch('confirm-delete', { id: {{ $treatment->id }} })" class="text-red-600 hover:text-red-900">
            <i class="fa-solid fa-trash"></i>
        </button>
    @endcan
</div>
