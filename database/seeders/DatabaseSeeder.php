<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(25)->create();
        // \App\Models\Civilian::factory(50)->create();

         \App\Models\User::factory()->create([
            'name' => 'BYAMUNGU Lewis',
            'phone' => '0785436135',
            'email' => 'bmg@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'admin',
            'remember_token' => Str::random(10),
         ]);
         \App\Models\User::factory()->create([
            'name' => 'UWINEZA Landrine',
            'phone' => '0780983883',
            'email' => 'landrine@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'judge',
            'remember_token' => Str::random(10),
         ]);
    }
}
