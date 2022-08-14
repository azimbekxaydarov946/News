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
    public function mount()
    {
        if ($this->paginate == 'all') {
            $this->paginate = Category::count();
        }
    }

    public function render()
    {
        if ($this->paginate == 'all') {
            $this->search = null;
        }

        $categories = Category::paginate((int)$this->paginate);
        $parents = Category::with('parent')->get();
        $tags = Tag::all();
        return view('livewire.category-component', ['categories' => $categories, 'tags' => $tags, 'parents' => $parents])->layout('layouts.base');
    }

    public function menyu($id = null)
    {
        $this->search = $id;
    }
}
