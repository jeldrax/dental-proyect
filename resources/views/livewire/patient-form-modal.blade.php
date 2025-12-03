<x-dialog-modal wire:model="isOpen">
    <x-slot name="title">
        {{ $patientId ? 'Editar Paciente' : 'Crear Paciente' }}
    </x-slot>

    <x-slot name="content">
        <div class="mb-4">
            <x-label for="name" value="{{ __('Nombre') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="email" />
            <x-input-error for="email" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-label for="password" value="{{ __('Contraseña') }}" />
            <x-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="password" autocomplete="new-password" />
            @if (!$patientId)
                <x-input-error for="password" class="mt-2" />
            @else
                <p class="mt-2 text-sm text-gray-600">Dejar en blanco para no cambiar la contraseña.</p>
                <x-input-error for="password" class="mt-2" />
            @endif
        </div>

        <div class="mb-4">
            <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
            <x-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-secondary-button wire:click="closeModal" wire:loading.attr="disabled">
            {{ __('Cancelar') }}
        </x-secondary-button>

        <x-button class="ms-3" wire:click="savePatient" wire:loading.attr="disabled">
            {{ $patientId ? 'Guardar Cambios' : 'Crear' }}
        </x-button>
    </x-slot>
</x-dialog-modal>
