<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);

        Category::truncate();
        for($i=0;$i<10;$i++){
            Category::create([
                'name_en'=>'hello',
                'name_ru'=>'привет',
                'name_uz'=>'salom',
                'image'=>($i<6)?$i.'.jpg':1+'.jpg',
                'parent_id'=>($i<=3)??0,
                'status'=>true,
                'tag_id'=>$i
            ]);
        }
        // $this->call(CategorySeeder::class);
        // $this->call(CommentSeeder::class);
        // $this->call(NewsSeeder::class);
        // $this->call(TagsSeeder::class);
    }
}
