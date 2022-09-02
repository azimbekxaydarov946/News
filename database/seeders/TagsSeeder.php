<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();
        for($i=0;$i<10;$i++){
            Tag::create([
                "name_uz"=>fake()->unique()->words(1,true),
                "name_en"=>fake()->unique()->words(1,true),
                "name_ru"=>fake()->unique()->words(1,true),
            ]);
        }
    }
}
