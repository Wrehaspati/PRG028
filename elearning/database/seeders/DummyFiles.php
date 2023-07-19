<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyFiles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\File::factory()->create([
            'filename' => 'tugas_1.pdf',
            'path' => 'dummy_files/',
            'assignment_id' => '1',
            'user_id' => '1',
            'assign_by' => 'teacher',
        ]);

        \App\Models\File::factory()->create([
            'filename' => '220040011.pdf',
            'assignment_id' => '1',
            'user_id' => '3',
            'assign_by' => 'student',
            'grade' => '100'
        ]);

        \App\Models\File::factory()->create([
            'filename' => '220050012.pdf',
            'assignment_id' => '1',
            'user_id' => '4',
            'assign_by' => 'student',
        ]);
    }
}
