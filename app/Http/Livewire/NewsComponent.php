<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
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
