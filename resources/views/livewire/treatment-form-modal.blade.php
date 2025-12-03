<div>
    <x-dialog-modal wire:model.live="showModal">
        <x-slot name="title">
            {{ $isEditing ? 'Editar Tratamiento' : 'Crear Tratamiento' }}
        </x-slot>

        <x-slot name="content">
            <div class="space-y-4">
                <!-- Name -->
                <div>
                    <x-label for="name" value="{{ __('Nombre') }}" />
                    <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" />
                    <x-input-error for="state.name" class="mt-2" />
                </div>

                <!-- Description -->
                <div>
                    <x-label for="description" value="{{ __('Descripción') }}" />
                    <textarea id="description" rows="4" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="state.description"></textarea>
                    <x-input-error for="state.description" class="mt-2" />
                </div>

                <!-- Price -->
                <div>
                    <x-label for="price" value="{{ __('Precio') }}" />
                    <x-input id="price" type="number" step="0.01" class="mt-1 block w-full" wire:model.defer="state.price" />
                    <x-input-error for="state.price" class="mt-2" />
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showModal', false)" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>

            <x-button class="ms-3" wire:click="saveTreatment" wire:loading.attr="disabled">
                Guardar
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>