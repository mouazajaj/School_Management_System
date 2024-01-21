<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassModel>
 */
class ClassModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->unique()->word(),
            'status'=>fake()->randomElement([0,1]),
            'created_by'=>fake()->randomElement(User::role('Admin')->pluck('id')),
        ];
    }
    protected $model = ClassModel::class;
}