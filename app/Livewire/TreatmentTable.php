<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Treatment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str; // Para cortar descripciones largas
use Livewire\Attributes\On;

class TreatmentTable extends DataTableComponent
{
    protected $model = Treatment::class;
    
    protected $listeners = ['treatmentSaved' => '$refresh'];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    // En el método columns():
    public function columns(): array
    {
        return [
            Column::make("Id", "id")->sortable(),
            Column::make("Nombre", "name")->sortable()->searchable(),
            Column::make("Descripción", "description")
                ->format(fn($value) => Str::limit($value, 50)) // Corta texto largo
                ->html(),
            Column::make("Precio", "price")
                ->sortable()
                ->format(fn($value) => '$' . number_format($value, 2)), // Ej: $500.00
            
            // Botones (usando el truco del 'id' para evitar errores)
            Column::make("Acciones", "id")
                ->format(function($value, $row, $column) {
                    return view('admin.treatments.actions', ['treatment' => $row]);
                })
                ->html(),
        ];
    }

    #[On('confirm-delete')]
    public function deleteTreatment($id)
    {
        if (!auth()->user()->can('admin.treatments.delete')) {
            $this->dispatch('show-swal-error', 'No tienes permiso para eliminar tratamientos.');
            return;
        }

        $treatment = Treatment::find($id);

        if ($treatment) {
            $treatment->delete();
            $this->dispatch('show-swal-success', 'El tratamiento fue eliminado correctamente.');
        }
    }
}