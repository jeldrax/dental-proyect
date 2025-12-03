<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Treatment; // Import the Treatment model

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Treatment::create([
            'name' => 'Limpieza Dental',
            'description' => 'Limpieza profunda para remover placa y sarro.',
            'price' => 50.00,
            'duration_minutes' => 45,
        ]);

        Treatment::create([
            'name' => 'Blanqueamiento Dental',
            'description' => 'Tratamiento para aclarar el tono de los dientes.',
            'price' => 150.00,
            'duration_minutes' => 90,
        ]);

        Treatment::create([
            'name' => 'Extracción Simple',
            'description' => 'Extracción de un diente sin complicaciones.',
            'price' => 80.00,
            'duration_minutes' => 60,
        ]);

        Treatment::create([
            'name' => 'Endodoncia',
            'description' => 'Tratamiento de conducto para salvar un diente dañado.',
            'price' => 250.00,
            'duration_minutes' => 120,
        ]);
    }
}