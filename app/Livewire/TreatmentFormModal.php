<?php

namespace App\Livewire; // <--- ¡ESTO ERA LO QUE FALTABA!

use Livewire\Component;
use App\Models\Treatment;
use Livewire\Attributes\On;

class TreatmentFormModal extends Component
{
    public $showModal = false;
    public $isEditing = false;
    public $treatment_id;
    
    public $state = []; 

    protected function rules()
    {
        return [
            'state.name' => 'required|string|max:255',
            'state.description' => 'required|string',
            'state.price' => 'required|numeric|min:0',
        ];
    }

    #[On('createTreatment')]
    public function createTreatment()
    {
        $this->isEditing = false;
        $this->resetErrorBag();
        
        $this->state = [
            'name' => '',
            'description' => '',
            'price' => ''
        ];
        
        $this->showModal = true;
    }

    #[On('edit-treatment')]
    public function editTreatment($id)
    {
        $this->isEditing = true;
        $this->resetErrorBag();

        $treatment = Treatment::findOrFail($id);
        $this->treatment_id = $treatment->id;

        $this->state = $treatment->only(['name', 'description', 'price']);

        $this->showModal = true;
    }

    public function saveTreatment()
    {
        $validatedData = $this->validate();

        if ($this->isEditing) {
            $treatment = Treatment::findOrFail($this->treatment_id);
            $treatment->update($validatedData['state']);
        } else {
            Treatment::create($validatedData['state']);
        }

        $this->dispatch('treatment-saved'); 
        
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.treatment-form-modal');
    }
}