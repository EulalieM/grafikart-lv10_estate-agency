@extends('default.base')

@section('title', 'Tous nos biens')

@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <form action="" method="get" class="container d-flex gap-3">
            <input type="number" placeholder="Surface min" class="form-control" name="surface" value="{{ $input['surface'] ?? '' }}">
            <input type="number" placeholder="Nb pièces min" class="form-control" name="rooms" value="{{ $input['rooms'] ?? '' }}">
            <input type="number" placeholder="Budget max" class="form-control" name="price" value="{{ $input['price'] ?? '' }}">
            <input type="text" placeholder="Mots clés" class="form-control" name="title" value="{{ $input['title'] ?? '' }}">
            <button class="btn btn-primary btn-sm">Rechercher</button>
        </form>
    </div>

    <div class="container my-5">
        <h1 class="mb-4">Tous nos biens</h1>
        <div class="row g-4">
            @forelse ($properties as $property)
            <div class="col-3">
                @include('property.card')
            </div>
            @empty
            <div class="col">
                <p>Aucun bien ne correspond à votre recherche.</p>
            </div>
            @endforelse
        </div>
        <div class="my-4">
            {{ $properties->links() }}
        </div>
    </div>

@endsection
