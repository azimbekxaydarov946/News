<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'parent_id' => $this->faker->numberBetween(0, 10),
            'image' => $this->faker->imageUrl(),
            'status' => $this->faker->boolean(),
            'tag_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
