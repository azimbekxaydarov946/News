<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryComponent extends Component
{
    use WithPagination;
    public $paginate;
    public $search;

    public function render()
    {
        if ($this->paginate == 'all') {
            $this->paginate = Category::count();
            $this->search = null;
        }
        $parents = Category::with('parent')->whereNull('parent_id')->orWhere('parent_id',0)->get();
        $categories = Category::query();
        if ($this->search) {
            $categories = $categories->where('parent_id', $this->search);
        } else {
            $categories = $categories->where(function ($q) {
                $q->whereNull('parent_id')->orWhere('parent_id', '>=', 0);
            });
        }
        $categories = $categories->paginate((int)$this->paginate);
        $tags = Tag::all();

        return view('livewire.category-component', ['categories' => $categories, 'tags' => $tags, 'parents' => $parents])->layout('layouts.base');
    }

    public function menyu($id = null)
    {
        $this->search = $id;
    }

    public function total()
    {
        $this->paginate = 'all';
    }
}
