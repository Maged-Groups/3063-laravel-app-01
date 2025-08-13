<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
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
            'email' => fake()->safeEmail(),
            'mobile' => fake()->e164PhoneNumber(),
            'roles' => fake()->randomElement(['admin', 'user', 'client', 'provider', 'employee']),
            'password' => 'password'
        ];
    }
}
