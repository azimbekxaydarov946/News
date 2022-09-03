<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_en'=> $this->faker->unique()->words(1,true),
            'name_ru'=> $this->faker->unique()->words(1,true),
            'name_uz'=> $this->faker->unique()->words(1,true)
        ];
    }
}
