@extends('default.base')

@section('title', 'Tous nos biens')

@section('content')

    <div class="container my-5">
        <h1 class="mb-4">Tous nos biens</h1>
        <div class="row g-4">
            @foreach ($properties as $property)
            <div class="col-3">
                @include('property.card')
            </div>
            @endforeach
        </div>
        <div class="my-4">
            {{ $properties->links() }}
        </div>
    </div>

@endsection
