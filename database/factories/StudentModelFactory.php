<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' =>fake()->email(),
            'email_verified_at' => now(),
            'gender'=>fake()->randomElement(['m','f']),
            'status'=>fake()->randomElement([0,1]),
            'date_of_birth'=>fake()->date(),
            'admission_number'=>fake()->randomNumber(5, true),
            'class_id'=>fake()->randomElement(ClassModel::all()->pluck('id')),
            'roll_number'=>fake()->randomNumber(5, true),
            //'profile_picture'=>fake()->image('public/assets/img/profiles/students',640, 480, 'person', true),
            'mobile_phone'=>fake()->phoneNumber(5),
            'parent_id'=>fake()->randomElement(User::role('Parent')->pluck('id')),
            'address'=>fake()->word(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
     protected $model = User::class;
}