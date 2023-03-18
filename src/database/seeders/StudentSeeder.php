<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'name' => 'student1',
            ],
            [
                'name' => 'student2',
            ],
        ]);

        DB::table('lesson_student')->insert([
            [
                'student_id' => 1,
                'lesson_id' => 1,
            ],
            [
                'student_id' => 1,
                'lesson_id' => 2,
            ],
            [
                'student_id' => 2,
                'lesson_id' => 1,
            ]
        ]);
    }
}
