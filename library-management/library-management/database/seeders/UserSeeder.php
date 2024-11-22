<?php

namespace Database\Seeders;
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
        //
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin1234'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Basic User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user1234'),
            'role' => 'user'
        ]);
    }
}
