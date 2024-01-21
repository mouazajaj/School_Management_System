<?php

namespace Database\Seeders;

use App\Models\Week;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Week::Create(
            [
                'name'=>'Monday'
            ]);
            Week::Create(
            [
                'name'=>'Tuesday'
            ]);
            Week::Create(
            [
                'name'=>'Wednesday'
            ]);
            Week::Create(
            [
                'name'=>'Thursday'
            ]);
            Week::Create(
            [
                'name'=>'Friday '
            ]);
            Week::Create(

            [
                'name'=>'Saturday'
            ]);
            Week::Create(
            [
                'name'=>'Sunday'
            ]
        );
    }
}