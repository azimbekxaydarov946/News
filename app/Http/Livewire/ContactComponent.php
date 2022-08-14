<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Contact;
use Carbon\Carbon;
use Livewire\Component;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $text;
    public $category;
    public function render()
    {
        $catgeories = Category::all();
        return view('livewire.contact-component', ['catgeories' => $catgeories])->layout('layouts.base');
    }

    public function add_contact()
    {
        $test = Contact::where('email', $this->email)
            ->whereDate('created_at', date('Y-m-d'))->get();
        if ($test->count()>0) {
            session()->flash('error', 'You have already contacted');
        } else {
             Contact::create([
                'name' => $this->name,
                'email' => $this->email,
                'text' => $this->text,
                'category_id' => $this->category,
            ]);

            session()->flash('success', 'Your message has been sent successfully');
        }
    }
}
