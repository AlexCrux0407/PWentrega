<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation;
use App\Models\User;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first(); // Asume que ya tienes un usuario creado

        Reservation::create([
            'user_id' => $user->id,
            'service_type' => 'Hotel',
            'description' => 'Hotel Las Palmas, habitación doble',
            'price' => 120.50,
            'status' => 'pending',
        ]);

        Reservation::create([
            'user_id' => $user->id,
            'service_type' => 'Vuelo',
            'description' => 'Vuelo Ciudad de México a Cancún',
            'price' => 300.75,
            'status' => 'pending',
        ]);
    }
}

    
        
    
