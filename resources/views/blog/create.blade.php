@extends('base')

@section('title', 'Créer un article')

@section('content')

    <h1 class="mb-5">Créer un article</h1>

    <form action="" method="post">
        @csrf
        <div class="row row-cols-1 g-3">
            <div class="col">
                <input type="text" name="title" value="Article de démonstration 3">
            </div>
            <div class="col">
                <textarea name="content">Contenu de démonstration 3</textarea>
            </div>
            <div class="col">
                <button class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </form>

@endsection
