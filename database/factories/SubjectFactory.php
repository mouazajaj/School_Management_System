<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Support\Str;
use Mockery\Matcher\Subset;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'name'=> fake()->unique()->word(),
            'type'=>fake()->randomElement(['Theory','Practical']),
            'status'=>fake()->randomElement([0,1]),
            'teacher_id'=>fake()->randomElement(User::role('Teacher')->pluck('id')),
            
        ];
    }
      protected $model =Subject::class;
}