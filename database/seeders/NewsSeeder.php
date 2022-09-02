<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::truncate();
        for($i=0;$i<10;$i++){
            News::create([
                'title_en'=>fake()->words(5,true),
                'title_ru'=>fake()->words(5,true),
                'title_uz'=>fake()->words(5,true),

                'sub_title_en'=>fake()->words(5,true),
                'sub_title_ru'=>fake()->words(5,true),
                'sub_title_uz'=>fake()->words(5,true),

                'description_en'=>fake()->words(300,true),
                'description_ru'=>fake()->words(300,true),
                'description_uz'=>fake()->words(300,true),

                'image'=>fake()->numberBetween(1,5).'.jpg',
                'date'=>fake()->date(),
                'user_id'=>fake()->numberBetween(2,10),
                'category_id'=>fake()->numberBetween(1,10),
                'status'=>fake()->boolean(),
                'tag_id'=>fake()->numberBetween(1,10)
            ]);
        }
    }
}
