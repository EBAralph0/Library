<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GroupeEmprunt;

class GroupeEmpruntSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        GroupeEmprunt::create([
            'date' => '2023-10-01'
        ]);
    }
}
