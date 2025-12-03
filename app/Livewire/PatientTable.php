<?php

namespace App\Livewire; // <--- ¡ESTA LÍNEA ES OBLIGATORIA!

use App\Models\User;
use Livewire\Component;

class PatientTable extends Component
{
    #[On('refreshPatientTable')]
    public function render()
    {
        // Tu lógica está bien: busca usuarios con el rol 'Paciente'
        $patients = User::whereHas('roles', function ($query) {
            $query->where('name', 'Paciente');
        })->get();

        return view('livewire.patient-table', [
            'patients' => $patients,
        ]);
    }
}