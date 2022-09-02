<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    protected $model=News::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title_en'=>$this->faker->words(5,true),
            'title_ru'=>$this->faker->words(5,true),
            'title_uz'=>$this->faker->words(5,true),

            'sub_title_en'=>$this->faker->words(5,true),
            'sub_title_ru'=>$this->faker->words(5,true),
            'sub_title_uz'=>$this->faker->words(5,true),

            'description_en'=>$this->faker->words(300,true),
            'description_ru'=>$this->faker->words(300,true),
            'description_uz'=>$this->faker->words(300,true),

            'image'=>$this->faker->numberBetween(1,5).'.jpg',
            'date'=>$this->faker->date(),
            'user_id'=>$this->faker->numberBetween(2,10),
            'category_id'=>$this->faker->numberBetween(1,10),
            'status'=>$this->faker->boolean(),
            'tag_id'=>$this->faker->numberBetween(1,10)
        ];
    }
}
