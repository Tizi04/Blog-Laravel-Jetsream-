<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.post-index', [
            'posts' => Post::orderBy('id', 'desc')->paginate(10),
        ]);
    }
}
