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
            'day' => 'Senin',
            'time_start' => '08:00',
            'time_end' => '10:00',
            'grade_id' => '2212101',
            'teacher_id' => '1' 
        ]);

        \App\Models\Subject::factory()->create([
            'subject_name' => 'Matematika',
            'day' => 'Senin',
            'time_start' => '10:00',
            'time_end' => '12:00',
            'grade_id' => '2210204',
            'teacher_id' => '2' 
        ]);

        \App\Models\Subject::factory()->create([
            'subject_name' => 'Fisika',
            'day' => 'Selasa',
            'time_start' => '08:00',
            'time_end' => '09:30',
            'grade_id' => '2212101',
            'teacher_id' => '1'
        ]);

        \App\Models\Subject::factory()->create([
            'subject_name' => 'Fisika Dasar',
            'day' => 'Rabu',
            'time_start' => '08:15',
            'time_end' => '11:30',
            'grade_id' => '2210204',
            'teacher_id' => '2'
        ]);

        \App\Models\Subject::factory()->create([
            'subject_name' => 'Seni Budaya',
            'day' => 'Rabu',
            'time_start' => '09:30',
            'time_end' => '13:00',
            'grade_id' => '2212101',
            'teacher_id' => '1'
        ]);

        \App\Models\Subject::factory()->create([
            'subject_name' => 'Kimia',
            'day' => 'Kamis',
            'time_start' => '08:00',
            'time_end' => '09:30',
            'grade_id' => '2212101',
            'teacher_id' => '1'
        ]);

        \App\Models\Subject::factory()->create([
            'subject_name' => 'Kewirausahaan',
            'day' => 'Jumat',
            'time_start' => '08:00',
            'time_end' => '13:00',
            'grade_id' => '2212101',
            'teacher_id' => '1'
        ]);

        \App\Models\Subject::factory()->create([
            'subject_name' => 'PPKN',
            'day' => 'Sabtu',
            'time_start' => '09:00',
            'time_end' => '11:30',
            'grade_id' => '2212101',
            'teacher_id' => '1'
        ]);
    }
}
