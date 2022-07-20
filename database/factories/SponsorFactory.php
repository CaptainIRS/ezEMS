<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sponsor>
 */
class SponsorFactory extends Factory
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
            'tagline' => $this->faker->sentence,
            'url' => $this->faker->url,
            'type' => $this->faker->randomElement(['sponsor', 'partner']),
        ];
    }
}
