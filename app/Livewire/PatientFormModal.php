<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class PatientFormModal extends Component
{
    public $isOpen = false;
    public $patientId;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $listeners = ['createPatient', 'editPatient'];

    public function createPatient()
    {
        $this->resetInputFields();
        $this->isOpen = true;
    }

    public function editPatient($patientId)
    {
        $patient = User::findOrFail($patientId);
        $this->patientId = $patient->id;
        $this->name = $patient->name;
        $this->email = $patient->email;
        $this->isOpen = true;
    }

    public function savePatient()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->patientId)],
        ];

        if (!$this->patientId) { // Creating new patient
            $rules['password'] = 'required|string|min:8|confirmed';
        } else { // Updating existing patient
            if ($this->password) { // Only validate password if it's being changed
                $rules['password'] = 'required|string|min:8|confirmed';
            }
        }

        $this->validate($rules);

        if ($this->patientId) {
            $patient = User::findOrFail($this->patientId);
            $patient->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);

            if ($this->password) {
                $patient->update([
                    'password' => Hash::make($this->password),
                ]);
            }
            session()->flash('message', 'Paciente actualizado exitosamente.');
        } else {
            $patient = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
            $patientRole = Role::where('name', 'Paciente')->first();
            if ($patientRole) {
                $patient->assignRole($patientRole);
            }
            session()->flash('message', 'Paciente creado exitosamente.');
        }

        $this->closeModal();
        $this->dispatch('refreshPatientTable');
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->patientId = null;
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function render()
    {
        return view('livewire.patient-form-modal');
    }
}
