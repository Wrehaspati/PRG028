<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyStudents extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Student::factory()->create([
            'id' => '220040011',
            'student_name' => 'Rai',
            'status' => 'verified',
            'user_id' => '3'
        ]);

        \App\Models\Student::factory()->create([
            'id' => '220050012',
            'student_name' => 'Reyna',
            'status' => 'verified',
            'user_id' => '4'
        ]);

    }
}
