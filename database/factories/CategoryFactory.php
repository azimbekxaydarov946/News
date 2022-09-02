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
            'name_en'=>$this->faker->words(3,true),
            'name_ru'=>$this->faker->words(3,true),
            'name_uz'=>$this->faker->words(3,true),
            'image'=>$this->faker->numberBetween(1,5).'.jpg',
            'parent_id'=>$this->faker->numberBetween(1,3),
            'status'=>$this->faker->boolean(),
            'tag_id'=>$this->faker->numberBetween(1,10)
        ];
    }
}
