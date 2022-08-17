<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use App\Models\Tag;
use Livewire\Component;
use Termwind\Components\Dd;

class DetailsComponent extends Component
{
    public $detail;
    public $name;
    public $email;
    public $text;

    public function mount($id = null)
    {
        $this->detail = $id;
    }

    public function render()
    {
        $news = News::whereYear('date', date('Y'))->inRandomOrder()
            ->paginate(4);
        $tags = Tag::get();
        $categories = Category::withCount('news')->get();
        $details = News::with(['comment' => function ($query) {
            $query
                ->orderBy('id', 'desc')
                ->paginate(4);
        }])
            ->with('user','tag')
            ->withCount('comment')
            ->find($this->detail);
        return view('livewire.details-component', [
            'details' => $details,
            'news' => $news,
            'tags' => $tags,
            'categories' => $categories
        ])->layout('layouts.base');
    }

    public function add_comment()
    {
        $test = Comment::where('email', $this->email)->where('news_id',$this->detail)->get();
        if ($test->isEmpty() && $this->text) {
            Comment::create([
                'name' => $this->name,
                'email' => $this->email,
                'text' => $this->text,
                'news_id' => $this->detail
            ]);
            $this->clear_comment();
            session()->flash('success', 'Comment added successfully');
        } else {
            session()->flash('error', 'You have already commented');
        }
    }

    public function clear_comment()
    {
        $this->name = null;
        $this->email = null;
        $this->text = null;
    }
}
