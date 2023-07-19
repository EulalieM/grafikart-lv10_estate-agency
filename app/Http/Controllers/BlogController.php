<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use App\Http\Requests\BlogFilterRequest;
use App\Http\Requests\FormPostRequest;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(): View
    {
        $category = Category::find(1);
        $category->posts()->where('id', '>', '10')->get();
        return view('blog.index', [
            'posts' => Post::paginate(2)
        ]);
    }

    public function create()
    {
        $post = new Post();
        $post->title = 'Bonjour'; // pré-remplir le form avec des données de test
        return view('blog.create', [
            'post' => $post
        ]);
    }

    public function store(FormPostRequest $request)
    {
        $post = Post::create($request->validated());
        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])
            -> with('success', "L'article a bien été sauvegardé.");
    }

    public function edit(Post $post)
    {
        return view('blog.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post, FormPostRequest $request)
    {
        $post->update($request->validated());
        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])
            -> with('success', "L'article a bien été modifié.");
    }

    public function show(string $slug, Post $post): RedirectResponse | View
    {
        if ($post->slug != $slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }
        return view('blog.show', [
            'post' => $post
        ]);
    }
}
