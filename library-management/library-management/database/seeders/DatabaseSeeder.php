<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\LivreSeeder;
use Database\Seeders\MembreSeeder;
use Database\Seeders\GroupeEmpruntSeeder;
use Database\Seeders\EmpruntSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            UserSeeder::class,
            LivreSeeder::class,
            MembreSeeder::class,
            GroupeEmpruntSeeder::class,
            EmpruntSeeder::class,
        ]);
    }
}
