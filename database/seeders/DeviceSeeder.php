<?php

namespace Database\Seeders;

use App\Models\ClientDevice;
use App\Models\Device;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $device1 = Device::create([
            "name" => "Laptop",
            "brand" => "Marca",
            "model" => "Modelo",
            "serial_number" => "12345ABC",
            "purchase_date" => "2023-10-24",
            "location" => "Oficina",
            "physical_state" => "Nuevo",
            "status_description" => "Funciona correctamente",
            "technical_specifications" => "Precesador i7, 16 GB RAM",
            "installation_date" => "2023-10-24",
            "garantia" => "1 año",
            "accessories" => "Cargador",
            "current_value" => 1000,
            "imagen" => "aun no"
        ]);

        $clientDevice1 = new ClientDevice();
        $clientDevice1->client_id = 2; 
        $clientDevice1->device_id = $device1->id; 
        $clientDevice1->save();

        $device2 = Device::create([
            "name" => "Smarphone",
            "brand" => "Samsung",
            "model" => "Galaxy S21",
            "serial_number" => "ABC123XYZ",
            "purchase_date" => "2023-10-24",
            "location" => "Bolsillo",
            "physical_state" => "Usado",
            "status_description" => "Pantalla ligeramente rayada",
            "technical_specifications" => "snapdragon 888, 8 GB RAM",
            "installation_date" => "2023-10-24",
            "garantia" => "2 año",
            "accessories" => "Cargador, auriculares",
            "current_value" => 230,
            "imagen" => "aun no"
        ]);

        $clientDevice2 = new ClientDevice();
        $clientDevice2->client_id = 2; 
        $clientDevice2->device_id = $device2->id; 
        $clientDevice2->save();

        $device3 = Device::create([
            "name" => "Portátil",
            "brand" => "HP",
            "model" => "Pavilion",
            "serial_number" => "wxyz9876",
            "purchase_date" => "2023-10-24",
            "location" => "Oficina2",
            "physical_state" => "Nuevo",
            "status_description" => "Funciona correctamente",
            "technical_specifications" => "Precesador Ryzen 7, 16 GB RAM",
            "installation_date" => "2023-10-24",
            "garantia" => "1 año",
            "accessories" => "Cargador, Mouse",
            "current_value" => 3000,
            "imagen" => "aun no"
        ]);

        $clientDevice3 = new ClientDevice();
        $clientDevice3->client_id = 2;
        $clientDevice3->device_id = $device3->id;
        $clientDevice3->save();

        
    }
}
