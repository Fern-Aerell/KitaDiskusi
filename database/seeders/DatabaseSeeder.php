<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'habib',
            'email' => 'habib@admin.com',
        ]);

        User::factory()->create([
            'name' => 'nia',
            'email' => 'nia@admin.com',
        ]);

        User::factory()->create([
            'name' => 'aerel',
            'email' => 'aerel@admin.com',
        ]);

        User::factory()->create([
            'name' => 'nico',
            'email' => 'nico@admin.com',
        ]);
    }
}
