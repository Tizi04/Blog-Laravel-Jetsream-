<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostCreate extends Component
{   

    public $title, $slug, $category, $content;

    protected $rules = [
        'title' => 'required|min:3',
        'slug' => 'required|unique:posts,slug',
        'category' => 'required',
        'content' => 'required|min:10',
    ];

    public function store()
    {
        $this->validate();

        Post::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'category' => $this->category,
            'content' => $this->content,
            'user_id' => Auth::id(),
        ]);

        session()->flash('message', '✅ Post creado con éxito.');

        $this->reset(['title', 'slug', 'category', 'content']);

        return redirect()->route('myPosts');

    }

    public function render()
    {
        return view('livewire.post-create');
    }
}
