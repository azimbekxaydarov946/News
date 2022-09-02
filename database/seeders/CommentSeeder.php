<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::truncate();
        for($i=0;$i<10;$i++){
            Comment::create([
                'text'=>fake()->text(),
                'name'=>fake()->name(),
                'email'=>fake()->email(),
                'date'=>fake()->date(),
                'news_id'=>fake()->numberBetween(1,10)
            ]);
        }
    }
}
