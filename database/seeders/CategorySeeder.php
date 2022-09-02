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
                'name_en'=>'hello',
                'name_ru'=>'привет',
                'name_uz'=>'salom',
                'image'=>($i<6)?$i.'.jpg':1+'.jpg',
                'parent_id'=>($i<=3)??0,
                'status'=>true,
                'tag_id'=>$i
            ]);
        }
    }
}
