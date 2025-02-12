<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $post = $this->route('post');           

        return [
            'title' => 'required|min:5|max:255',
            'slug' => "required|unique:posts,slug,{$post->id}|max:255",
            'category' => 'required|max:255',
            'content' => 'required|min:5',
        ];
    }
}
