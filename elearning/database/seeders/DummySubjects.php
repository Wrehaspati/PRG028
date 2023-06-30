<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummySubjects extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Subject::factory()->create([
            'subject_name' => 'Matematika',
            'grade_id' => '2212101',
            'teacher_id' => '1' 
        ]);

        \App\Models\Subject::factory()->create([
            'subject_name' => 'Matematika',
            'grade_id' => '2210204',
            'teacher_id' => '2' 
        ]);

        \App\Models\Subject::factory()->create([
            'subject_name' => 'Fisika',
            'grade_id' => '2212101',
            'teacher_id' => '1'
        ]);

        \App\Models\Subject::factory()->create([
            'subject_name' => 'Fisika Dasar',
            'grade_id' => '2210204',
            'teacher_id' => '2'
        ]);

        \App\Models\Subject::factory()->create([
            'subject_name' => 'Seni Budaya',
            'grade_id' => '2212101',
            'teacher_id' => '1'
        ]);

        \App\Models\Subject::factory()->create([
            'subject_name' => 'Kimia',
            'grade_id' => '2212101',
            'teacher_id' => '1'
        ]);

        \App\Models\Subject::factory()->create([
            'subject_name' => 'Kewirausahaan',
            'grade_id' => '2212101',
            'teacher_id' => '1'
        ]);

        \App\Models\Subject::factory()->create([
            'subject_name' => 'PPKN',
            'grade_id' => '2212101',
            'teacher_id' => '1'
        ]);
    }
}
