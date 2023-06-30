<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyRoles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Role::factory()->create([
            'user_id' => '1',
            'role' => 'teacher'
        ]);

        
        \App\Models\Role::factory()->create([
            'user_id' => '2',
            'role' => 'administrator'
        ]);

        \App\Models\Role::factory()->create([
            'user_id' => '5',
            'role' => 'teacher'
        ]);

    }
}
