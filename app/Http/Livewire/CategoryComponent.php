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
            dd($this->paginate);
        }
    }

    public function render()
    {
        if ($this->paginate == 'all') {
            $this->search = null;
        }

        $categories = Category::paginate((int)$this->paginate);
        $parents = Category::where('parent_id', 0)->get();
        $tags = Tag::all();
    //    dd(public_path('storage\aNhzRjJqFXmtx6q4Tc9E2QH1P8uqQzy6Yn7mwET2.png'));
    //    dd(storage_path('app\public\aNhzRjJqFXmtx6q4Tc9E2QH1P8uqQzy6Yn7mwET2.png'));
        return view('livewire.category-component', ['categories' => $categories, 'tags' => $tags, 'parents' => $parents])->layout('layouts.base');
    }

    public function menyu($id = null)
    {
        $this->search = $id;
    }
}
