<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use App\Models\Tag;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class NewsComponent extends Component
{
    use WithPagination;

    public $search;
    public $paginate;
    public $sort;

    public function mount($id = null)
    {
        $this->search = $id;
        if ($this->paginate == 'all') {
            $this->paginate = News::count();
        }

      if(News::count()<10){
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

              Comment::create([
                'text'=>fake()->text(),
                'name'=>fake()->name(),
                'email'=>fake()->email(),
                'date'=>fake()->date(),
                'news_id'=>fake()->numberBetween(1,10)
            ]);
            Category::create([
                'name_en'=>fake()->words(3,true),
                'name_ru'=>fake()->words(3,true),
                'name_uz'=>fake()->words(3,true),
                'image'=>fake()->numberBetween(1,5).'.jpg',
                'parent_id'=>fake()->numberBetween(0,3),
                'status'=>fake()->boolean(),
                'tag_id'=>fake()->numberBetween(1,10)
            ]);

            Tag::create([
              "name_uz"=>fake()->unique()->words(1,true),
              "name_en"=>fake()->unique()->words(1,true),
              "name_ru"=>fake()->unique()->words(1,true),
          ]);
          User::create([
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
          ])
          }
      }


    }

    public function render()
    {
        $news = News::query()->with('user', 'category', 'tag')
            ->withCount('comment')
            ->whereHas('category', function ($query) {
                $query->where('name_'.app()->getLocale(), 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('tag', function ($query) {
                $query->where('name_'.app()->getLocale(), 'like', '%' . $this->search . '%');
            });
            if ($this->sort=='None' || $this->sort==null) {
                $news=$news->inRandomOrder();
            }
            else{
                $news=$news->orderBy('date', $this->sort??'desc');
            }
            $news=$news->paginate((int)$this->paginate);
        $categories = Category::withCount('news')->get();
        $tags = Tag::all();
        return view('livewire.news-component', ['news' => $news, 'categories' => $categories, 'tags' => $tags])->layout('layouts.base');
    }
}
