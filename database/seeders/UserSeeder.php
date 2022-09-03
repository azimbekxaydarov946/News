<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        User::factory(9)->create();

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
