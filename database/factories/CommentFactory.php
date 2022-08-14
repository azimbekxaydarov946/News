<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'text' => $this->faker->text(),
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'date' => $this->faker->dateTime(),
            'news_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
