<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Technician;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // *Admin
        User::create([
            "first_name" => "alex",
            "last_name" => "ruiz",
            "email" => "alex@gmail.com",
            "password" => "12345678",
            "phone" => "313123456",
            "rol_id" => 1
        ]);

        // *Cliente
        $user2 = User::create([
            "first_name" => "Juan Pablo",
            "last_name" => "Montoya",
            "email" => "JuanPa@gmail.com",
            "password" => "12345678",
            "phone" => "313123456",
            "rol_id" => 2
        ]);

        $client = new Client();
        $client->user_id = $user2->id;
        $client->save();

        //* tecnico
        $user3 = User::create([
            "first_name" => "Mary",
            "last_name" => "Luz",
            "email" => "mar@gmail.com",
            "password" => "12345678",
            "phone" => "313123456",
            "rol_id" => 3
        ]);

        $technician = new Technician();
        $technician->user_id = $user3->id;
        $technician->save();
    }
}
