<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyGrades extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        \App\Models\Grade::factory()->create([
            'id' => '2212101',
            'grade_name' => 'Kelas XII Rekayasa Perangkat Lunak 1'
        ]);

        \App\Models\Grade::factory()->create([
            'id' => '2210204',
            'grade_name' => 'Kelas X Multimedia 4'
        ]);
    }
}
