@extends('base')

@section('title', 'Mon blog')

@section('content')

    <h1 class="mb-5">Mon blog</h1>

    <p>
        <a class="btn btn-primary" href="{{ route('blog.create') }}">Créer un article</a>
    </p>

    <!-- @dump($posts) -->

    @foreach ($posts as $post)
        <article class="my-5">
            <h2>{{ $post->title }}</h2>
            <p>
                {{ $post->content }}
            </p>
            <p>
                <a class="btn btn-sm btn-primary" href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}">
                    Lire la suite
                </a>
            </p>
        </article>
    @endforeach

    {{ $posts->links() }}

@endsection
