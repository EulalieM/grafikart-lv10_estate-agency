@extends('base')

@section('title', 'Mon blog')

@section('content')

    <h1>Mon blog</h1>

    <!-- @dump($posts) -->

    @foreach ($posts as $post)
        <article class="my-5">
            <h2>{{ $post->title }}</h2>
            <p>
                {{ $post->content }}
            </p>
            <p>
                <a class="btn btn-primary" href="{{ route('blog.show', ['post' => $post->slug]) }}">
                    Lire la suite
                </a>
            </p>
        </article>
    @endforeach

    {{ $posts->links() }}

@endsection
