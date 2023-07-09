<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $validator = Validator::make([
            'title' => 'Mimimum 8 caractères',
            'content' => 'Mon contenu'
        ], [
            'title' => 'required|min:8'
            // 'title' => [
            //     'required',
            //     'min:8'
            // ]
            // 'title' => [Rule::unique('posts')->ignore(2)]
        ]);

        // dd($validator->fails()); // bool
        // dd($validator->errors()); // messages d'erreur
        dd($validator->validated()); // retourne seulement les éléments validés

        return view('blog.index', [
            'posts' => Post::paginate(2)
        ]);
    }

    public function show(string $slug, int $id): RedirectResponse | View
    {
        $post = Post::findOrFail($id);
        if ($post->slug != $slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }
        return view('blog.show', [
            'post' => $post
        ]);
    }
}
