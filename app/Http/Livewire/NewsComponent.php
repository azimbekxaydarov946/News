<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Str;
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

        if (News::count() < 10) {
            for ($i = 0; $i < 10; $i++) {
                News::create([
                    'title_en' => 'News',
                    'title_ru' => 'Новости',
                    'title_uz' => 'Yangiliklar',

                    'sub_title_en' => 'News',
                    'sub_title_ru' => 'Новости',
                    'sub_title_uz' => 'Yangiliklar',

                    'description_en' => 'News description',
                    'description_ru' => 'Описание новости',
                    'description_uz' => 'Yangilik tavsifi',

                    'image' => (string)$i . '.jpg',
                    'date' => date('d/m/Y'),
                    'user_id' => $i,
                    'category_id' => $i,
                    'status' => true,
                    'tag_id' => $i
                ]);

                Comment::create([
                    'text' => 'Comment text',
                    'name' => 'Tom',
                    'email' => 'tom1@gmail.com',
                    'date' => date('d/m/Y'),
                    'news_id' => $i
                ]);
                Category::create([
                    'name_en' => 'Category name',
                    'name_ru' => 'Название категории',
                    'name_uz' => 'Kategoriya nomi',
                    'image' => (string)$i . '.jpg',
                    'parent_id' => ($i < 3) ? $i : 0,
                    'status' => true,
                    'tag_id' => $i
                ]);

                Tag::create([
                    "name_uz" => 'Tag nomi',
                    "name_en" => 'Tag name',
                    "name_ru" => 'Название тэга',
                ]);
                User::create([
                    'name' => 'Jon',
                    'email' => 'jon@gmail.com',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
                ]);
            }
        }
    }

    public function render()
    {
        $news = News::query()->with('user', 'category', 'tag')
            ->withCount('comment')
            ->whereHas('category', function ($query) {
                $query->where('name_' . app()->getLocale(), 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('tag', function ($query) {
                $query->where('name_' . app()->getLocale(), 'like', '%' . $this->search . '%');
            });
        if ($this->sort == 'None' || $this->sort == null) {
            $news = $news->inRandomOrder();
        } else {
            $news = $news->orderBy('date', $this->sort ?? 'desc');
        }
        $news = $news->paginate((int)$this->paginate);
        $categories = Category::withCount('news')->get();
        $tags = Tag::all();
        return view('livewire.news-component', ['news' => $news, 'categories' => $categories, 'tags' => $tags])->layout('layouts.base');
    }
}
