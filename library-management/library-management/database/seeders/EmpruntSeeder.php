<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Emprunt;

class EmpruntSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Emprunt::create([
            'groupe_emprunt_id' => 1,
            'livre_id' => 1,
            'membre_id' => 1,
            'date_heure_emprunt' => now(),
            'date_limite_remise' => now()->addDays(14),
            'statut' => false
        ]);
    }
}
