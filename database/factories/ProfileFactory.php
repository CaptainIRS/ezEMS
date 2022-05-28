<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'nationality' => $this->faker->randomElement(['Indian', 'Other']),
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'year_of_study' => $this->faker->year,
        ];
    }
}
