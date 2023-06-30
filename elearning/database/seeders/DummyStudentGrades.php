<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyStudentGrades extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\StudentGrade::factory()->create([
            'grade_id' => '2212101',
            'student_id' => '220040011'
        ]);

        \App\Models\StudentGrade::factory()->create([
            'grade_id' => '2210204',
            'student_id' => '220050012'
        ]);
    }
}
