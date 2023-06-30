<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyTeachers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Teacher::factory()->create([
            'teacher_name' => 'Pak Surabaya',
            'user_id' => '1'
        ]);

        \App\Models\Teacher::factory()->create([
            'teacher_name' => 'Pak Made',
            'user_id' => '5'
        ]);
    }
}
