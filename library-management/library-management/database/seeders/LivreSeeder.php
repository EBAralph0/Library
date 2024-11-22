<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Livre;

class LivreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Livre::create([
            'titre' => 'Livre Exemple',
            'auteur' => 'Auteur Exemple',
            'date_publication' => '2020-01-01',
            'resume' => 'Ceci est un résumé du livre.',
            'pages' => 300,
            'nombres_exemplaire_total' => 10,
            'quantite_restant_stock' => 8,
            'seuil_minimal_exemplaire' => 2
        ]);

        Livre::create([
            'titre' => 'Second Exemple',
            'auteur' => 'Second Auteur Exemple',
            'date_publication' => '2022-02-02',
            'resume' => 'Ceci le second  résumé du livre.',
            'pages' => 600,
            'nombres_exemplaire_total' => 50,
            'quantite_restant_stock' => 5,
            'seuil_minimal_exemplaire' => 2
        ]);

    }
}
