@extends('base')

@section('title', 'Créer un article')

@section('content')

    <h1 class="mb-5">Créer un article</h1>

    <form action="" method="post">
        @csrf
        <div class="row row-cols-1 g-4">
            <div class="col">
                <input type="text" name="title" value="{{ old('title', 'Mon titre') }}">
                @error("title")
                    <p class="text-danger mb-0">{{ $message }}</p>
                @enderror
            </div>
            <div class="col">
                <textarea name="content">{{ old('content') }}</textarea>
                @error("content")
                <p class="text-danger mb-0">{{ $message }}</p>
                @enderror
            </div>
            <div class="col">
                <button class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </form>

@endsection
