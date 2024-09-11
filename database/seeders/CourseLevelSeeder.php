<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CourseLevel;

class CourseLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (CourseLevel::count() == 0) {

            $data = [
                [
                    'name'  => 'Under Graudation',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name'  => 'Post Graudation',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ];

            CourseLevel::insert($data);
        }
    }
}
