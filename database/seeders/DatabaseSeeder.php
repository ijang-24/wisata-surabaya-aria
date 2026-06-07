<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Surabaya',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // User Biasa
        User::create([
            'name' => 'Aira',
            'email' => 'aira@gmail.com',
            'password' => Hash::make('aira12345'),
            'role' => 'user',
        ]);

        $this->call(WisataSeeder::class);
    }
}
