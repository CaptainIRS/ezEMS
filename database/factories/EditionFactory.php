<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Edition>
 */
class EditionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'year' => $this->faker->year,
            'start_time' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'end_time' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
        ];
    }
}
