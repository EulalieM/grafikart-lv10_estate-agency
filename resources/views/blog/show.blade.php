@extends('base')

@section('title', $post->title)

@section('content')

    <article class="my-5">
        <h1 class="mb-5">{{ $post->title }}</h2>
        <p>
            {{ $post->content }}
        </p>
    </article>

@endsection
