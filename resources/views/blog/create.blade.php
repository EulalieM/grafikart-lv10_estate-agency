@extends('base')

@section('title', 'Créer un article')

@section('content')

    <h1 class="mb-5">Créer un article</h1>

    <form action="" method="post">
        @csrf
        <div class="row row-cols-1 g-4">
            <div class="col">
                <label for="title">Titre*</label> <br>
                <input type="text" id="title" name="title" value="{{ old('title', 'Mon titre') }}">
                @error("title")
                    <p class="text-danger mb-0">{{ $message }}</p>
                @enderror
            </div>
            <div class="col">
                <label for="slug">Slug (auto-généré si non complété)</label> <br>
                <input type="text" id="slug" name="slug" value="{{ old('slug') }}">
                @error("slug")
                    <p class="text-danger mb-0">{{ $message }}</p>
                @enderror
            </div>
            <div class="col">
                <label for="content">Contenu*</label> <br>
                <textarea name="content" id="content">{{ old('content') }}</textarea>
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
