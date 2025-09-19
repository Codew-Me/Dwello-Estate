<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@dwello.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create Regular User
        User::create([
            'name' => 'John Doe',
            'email' => 'user@dwello.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Seed Properties and Agents
        $this->call([
            PropertySeeder::class,
            AgentSeeder::class,
        ]);
    }
}
