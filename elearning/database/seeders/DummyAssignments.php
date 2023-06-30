<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyAssignments extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Assignment::factory()->create([
            'assignment_title' => 'Tugas 1 | Bilangan Konstanta',
            'subject_id' => '1',
            'description' => 'Kerjakan soal berikut! Jawaban ditulis pada kertas lalu discan kemudian dikumpulkan dalam bentuk pdf.',
            'from_date' => '2023-06-29',
            'due_date' => '2024-06-29',
        ]);

        \App\Models\Assignment::factory()->create([
            'assignment_title' => 'Tugas 2 | Trigonometri',
            'subject_id' => '1',
            'description' => 'Kerjakan soal berikut! Jawaban ditulis pada kertas lalu discan kemudian dikumpulkan dalam bentuk pdf.',
            'from_date' => '2023-06-29',
            'due_date' => '2024-06-29',
        ]);

        \App\Models\Assignment::factory()->create([
            'assignment_title' => 'Materi Pertemuan 3 | Fungsi',
            'subject_id' => '1',
            'description' => 'Kerjakan soal berikut! Jawaban ditulis pada kertas lalu discan kemudian dikumpulkan dalam bentuk pdf.',
            'from_date' => '2023-06-29',
            'due_date' => '2024-06-29',
        ]);
    }
}
