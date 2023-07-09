<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use App\Http\Requests\BlogFilterRequest;

class BlogController extends Controller
{
    public function index(BlogFilterRequest $request): View
    {
        // /blog?slug=mon-slug&title=invalid // redirige vers la page précédente
        // /blog?slug=mon-slug&title=test valide 8 charact // accès à la page car title est valide
        // /blog?title=test valide 8 charact // accès à la page et génère le slug

        dd($request->validated());

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
