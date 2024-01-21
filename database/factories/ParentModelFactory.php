<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ParentModelFactory extends Factory
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
            //'profile_picture'=>fake()->image('public/assets/img/profiles/parents',640, 480, 'person', true),
            'status'=>fake()->randomElement([0,1]),
            'mobile_phone'=>fake()->phoneNumber(5),
            'date_of_birth'=>fake()->date(),
            'address'=>fake()->word(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
          
    }
     protected $model = User::class;
}