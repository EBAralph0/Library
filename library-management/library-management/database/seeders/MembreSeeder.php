<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Membre;

class MembreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Membre::create([
            'nom' => 'Membre Exemple',
            'matricule' => 'MEM001'
        ]);
    }
}
