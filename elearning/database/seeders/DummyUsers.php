<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Guru Killer',
            'email' => 'killer@example.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Penagih SPP',
            'email' => 'admin@example.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Student Rai',
            'email' => 'std@example.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Student Rey',
            'email' => 'std2@example.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Made in Bali',
            'email' => 'guru@example.com',
        ]);
    }
}
