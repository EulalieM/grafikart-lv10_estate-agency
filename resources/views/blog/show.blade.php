@extends('base')

@section('title', $post->title)

@section('content')

    <article class="my-5">
        <h1 class="mb-5">{{ $post->title }}</h2>
        <p>
            {{ $post->content }}
        </p>
    </article>

    <p class="my-5">
        <a class="btn btn-primary" href="{{ route('blog.edit', ['post' => $post->id]) }}">Modifier cet article</a>
    </p>

@endsection
