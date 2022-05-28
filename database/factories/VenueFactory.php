<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venue>
 */
class VenueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word . ' ' . $this->faker->word,
            'description' => $this->faker->paragraph,
            'location' => $this->faker->address,
            'capacity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
