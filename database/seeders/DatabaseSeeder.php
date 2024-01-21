<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\SubjectSeeder;
use Database\Seeders\TeacherSeeder;
use Database\Seeders\TimeTableSeeder;
use Database\Seeders\ClassModelSeeder;
use Database\Seeders\ParentModelSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call([
            
            RoleSeeder::class,
            UserSeeder::class,
            //TeacherSeeder::class,
            //ParentModelSeeder::class,
            //StudentSeeder::class,
            TimeTableSeeder::class,
            ClassModelSeeder::class,
            SubjectSeeder::class,

        ]);
    }
}