<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reports')->insert([
            'report_date' => now(),
            'service_type' => 'Reparación',
            'service_description' => 'Reemplazo de pantalla',
            'equipment_status' => 'Funcional',
            'replaced_parts' => 'Pantalla LCD',
            'service_cost' => '100.00',
            'service_time' => '2 horas',
            'remarks' => 'El cliente estaba satisfecho con el servicio',
            'imagen' => 'ruta_de_la_imagen.png',
            'technician_id' => 3, // ID del técnico (reemplaza con el ID correcto)
            'client_device_id' => 1, // ID del dispositivo del cliente (reemplaza con el ID correcto)
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
