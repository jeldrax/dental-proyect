<div>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
        <div class="flex justify-between">
            <h1 class="text-2xl font-medium text-gray-900">
                Pacientes
            </h1>
            @can('admin.users.create')
                <a href="#" wire:click="$dispatch('createPatient')" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                    Crear Paciente
                </a>
            @endcan
        </div>
    </div>

    <div class="bg-gray-200 bg-opacity-25">
        <div class="p-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Acciones</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($patients as $patient)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $patient->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $patient->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                @can('admin.users.edit')
                                    <a href="#" wire:click="$dispatch('editPatient', { patientId: {{ $patient->id }} })" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                @endcan
                                @can('admin.users.delete')
                                    <a href="#" class="text-red-600 hover:text-red-900 ml-4">Eliminar</a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @livewire('patient-form-modal')
</div>