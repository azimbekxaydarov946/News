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

        // $this->call(CategorySeeder::class);
        // $this->call(CommentSeeder::class);
        // $this->call(NewsSeeder::class);
        // $this->call(TagsSeeder::class);
    }
}
