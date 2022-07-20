<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->word.' '.$this->faker->word;
        $slug = Str::slug($name);

        return [
            'name' => $name,
            'slug' => $slug,
            'description' => $this->faker->paragraph,
            'rules' => $this->faker->paragraph,
            'prizes' => $this->faker->paragraph,
            'resources' => $this->faker->paragraph,
            'max_participants' => $this->faker->numberBetween(1, 100),
            'registration_fee' => $this->faker->randomElement([null, 1000]),
            'contact' => $this->faker->paragraph,
        ];
    }
}
