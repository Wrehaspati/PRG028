<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // Fake Account for teacher
        \App\Models\User::factory()->create([
            'name' => 'Guru Killer',
            'email' => 'killer@example.com',
        ]);

        \App\Models\Role::factory()->create([
            'user_id' => '1',
            'role' => 'teacher'
        ]);

        \App\Models\Teacher::factory()->create([
            'teacher_name' => 'Pak Surabaya',
            'user_id' => '1'
        ]);

        // Fake Account for administrator
        \App\Models\User::factory()->create([
            'name' => 'Penagih SPP',
            'email' => 'admin@example.com',
        ]);

        \App\Models\Role::factory()->create([
            'user_id' => '2',
            'role' => 'administrator'
        ]);

        // Fake Account Student
        \App\Models\User::factory()->create([
            'name' => 'Student Rai',
            'email' => 'std@example.com',
        ]);

        \App\Models\Student::factory()->create([
            'id' => '69',
            'student_name' => 'Rai',
            'user_id' => '3'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Student Rey',
            'email' => 'stpd@example.com',
        ]);

        \App\Models\Student::factory()->create([
            'id' => '70',
            'student_name' => 'Reyna',
            'user_id' => '4'
        ]);

        // Fake Grade
        \App\Models\Grade::factory()->create([
            'id' => '221211',
            'grade_name' => 'Kelas X Rekayasa Perangkat Lunak 1'
        ]);

        // Fake Subject
        \App\Models\Subject::factory()->create([
            'subject_name' => 'Matematika',
            'grade_id' => '221211',
            'teacher_id' => '1' 
        ]);
        \App\Models\Subject::factory()->create([
            'subject_name' => 'Fisika',
            'grade_id' => '221211',
            'teacher_id' => '1'
        ]);
        \App\Models\Subject::factory()->create([
            'subject_name' => 'Seni Budaya',
            'grade_id' => '221211',
            'teacher_id' => '1'
        ]);
        \App\Models\Subject::factory()->create([
            'subject_name' => 'Kimia',
            'grade_id' => '221211',
            'teacher_id' => '1'
        ]);
        \App\Models\Subject::factory()->create([
            'subject_name' => 'Kewirausahaan',
            'grade_id' => '221211',
            'teacher_id' => '1'
        ]);
        \App\Models\Subject::factory()->create([
            'subject_name' => 'PPKN',
            'grade_id' => '221211',
            'teacher_id' => '1'
        ]);

        // Fake Student_Grade
        \App\Models\StudentGrade::factory()->create([
            'grade_id' => '221211',
            'student_id' => '69'
        ]);

        // Fake Assignment
        \App\Models\Assignment::factory()->create([
            'assignment_title' => 'Tugas 1 | Bilangan Konstanta',
            'subject_id' => '1',
            'description' => 'Kerjakan soal berikut! Jawaban ditulis pada kertas lalu discan kemudian dikumpulkan dalam bentuk pdf.',
            'from_date' => '2023-06-29',
            'due_date' => '2024-06-29',
            'status' => 'Belum Dinilai'
        ]);

        \App\Models\Assignment::factory()->create([
            'assignment_title' => 'Tugas 2 | Trigonometri',
            'subject_id' => '1',
            'description' => 'Kerjakan soal berikut! Jawaban ditulis pada kertas lalu discan kemudian dikumpulkan dalam bentuk pdf.',
            'from_date' => '2023-06-29',
            'due_date' => '2024-06-29',
            'status' => 'Belum Dinilai'
        ]);

        \App\Models\Assignment::factory()->create([
            'assignment_title' => 'Materi Pertemuan 3 | Fungsi',
            'subject_id' => '1',
            'description' => 'Kerjakan soal berikut! Jawaban ditulis pada kertas lalu discan kemudian dikumpulkan dalam bentuk pdf.',
            'from_date' => '2023-06-29',
            'due_date' => '2024-06-29',
            'status' => 'Belum Dinilai'
        ]);
    }
}
