<?php

namespace Database\Seeders;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
         User::create(['name' => 'student',
            'email' => 'student@gmail.com',
            'gender'=>'m',
            'password' => Hash::make('password')])->assignRole('Student');
            
            
             User::create(['name' => 'Admin',
            'email' => 'admin@gmail.com',
            'gender'=>'m',
            'password' => Hash::make('password')])->assignRole('Admin');
            
              User::create(['name' => 'parent',
            'email' => 'parent@gmail.com',
            'gender'=>'m',
            'password' => Hash::make('password')])->assignRole('Parent');

            
             User::create(['name' => 'Teacher',
            'email' => 'teacher@gmail.com',
            'gender'=>'m',
            'password' => Hash::make('password')])->assignRole('Teacher');            
            

    }
}