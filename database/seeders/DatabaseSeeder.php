<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed default admin
        Admin::create([
            'name' => 'Admin JobYaari',
            'email' => 'admin@jobyaari.com',
            'password' => Hash::make('password123'),
        ]);

        // Seed default blogs
        $this->call(BlogSeeder::class);
    }
}
