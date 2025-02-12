<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MyPosts extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.my-posts', [
            'posts' => Post::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
