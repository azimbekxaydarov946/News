<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        for($i=0;$i<10;$i++){
            Category::create([
                'name_en'=>fake()->words(3,true),
                'name_ru'=>fake()->words(3,true),
                'name_uz'=>fake()->words(3,true),
                'image'=>fake()->numberBetween(1,5).'.jpg',
                'parent_id'=>fake()->numberBetween(0,3),
                'status'=>fake()->boolean(),
                'tag_id'=>fake()->numberBetween(1,10)
            ]);
        }
    }
}
