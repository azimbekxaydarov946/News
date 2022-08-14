<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'sub_title' => $this->faker->words(15,true),
            'description' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'date' => $this->faker->dateTime(),
            'user_id' => $this->faker->numberBetween(1, 10),
            'category_id' => $this->faker->numberBetween(1, 10),
            'tag_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
