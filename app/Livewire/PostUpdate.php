<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PostUpdate extends Component
{
    public $postId;
    public $post;
    public $title;
    public $slug;
    public $category;
    public $content;

    protected $rules = [
        'title' => 'required|min:5|max:255',
        'slug' => 'required|max:255',
        'category' => 'required|max:255',
        'content' => 'required|min:5',
    ];

    public function mount($postId)
    {
        $this->postId = $postId;

        if (!$postId || !is_numeric($postId)) {
            abort(404, 'Post no encontrado');
        }

        $this->post = Post::findOrFail($postId);

        if (Auth::id() !== $this->post->user_id) {
            abort(403, 'No tienes permiso para editar este post.');
        }

        $this->title = $this->post->title;
        $this->slug = $this->post->slug;
        $this->category = $this->post->category;
        $this->content = $this->post->content;
    }

    public function update()
    {
        $this->validate();

        if (Auth::id() !== $this->post->user_id) {
            throw ValidationException::withMessages(['error' => 'No tienes permiso para editar este post.']);
        }

        $this->post->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'category' => $this->category,
            'content' => $this->content,
        ]);

        session()->flash('success', '✅ Post actualizado correctamente.');

        return redirect()->route('myPosts'); 
    }

    public function render()
    {
        return view('livewire.post-update');
    }
}
