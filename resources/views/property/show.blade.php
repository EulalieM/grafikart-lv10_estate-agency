@extends('default.base')

@section('title', $property->title)

@section('content')

    <div class="container my-5">
        <div class="row">
            <div class="col-6">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach($property->pictures as $k => $picture)
                            <div class="carousel-item {{ $k == 0 ? 'active' : '' }}">
                                <img src="{{ $picture->getImageUrl(800, 530) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            <div class="col-6">
                <h1>{{ $property->title }}</h1>
                <h2>{{ $property->rooms }} pièces - {{ $property->surface }} m²</h2>
                <div class="text-primary fw-bold" style="font-size: 3rem;">
                    {{ number_format($property->price, thousands_separator: ' ') }} €
                </div>
                <hr>
                <div class="mt-4">
                    <h4>Intéressé par ce bien ?</h4>
                    @include('shared.flash')
                    <form action="{{ route('property.contact', $property) }}" method="post">
                        @csrf
                        <div class="row row-cols-2 g-2">
                            <x-input class="col" label="Prénom" name="firstname" />
                            {{-- @include('shared.input', ['class'=>'col', 'label'=>'Prénom', 'name'=>'firstname']) --}}
                            @include('shared.input', ['class'=>'col', 'label'=>'Nom', 'name'=>'lastname'])
                            @include('shared.input', ['class'=>'col', 'label'=>'Téléphone', 'name'=>'phone'])
                            @include('shared.input', ['class'=>'col', 'label'=>'Email', 'name'=>'email', 'type'=>'email'])
                            @include('shared.input', ['class'=>'col-12', 'label'=>'Message', 'name'=>'message', 'type'=>'textarea'])
                        </div>
                        <button class="btn btn-primary mt-3">Nous contacter</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="mt-4">
            {{-- <p>{{ nl2br($property->description) }}</p> --}}
            <p>{!! nl2br($property->description) !!}</p>
            <div class="row">
                <div class="col-8">
                    <h2 class="mb-3">Caractéristiques</h2>
                    <table class="table table-striped">
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{ $property->surface }} m²</td>
                        </tr>
                        <tr>
                            <td>Pièces</td>
                            <td>{{ $property->rooms }}</td>
                        </tr>
                        <tr>
                            <td>Chambre(s)</td>
                            <td>{{ $property->bedrooms }}</td>
                        </tr>
                        <tr>
                            <td>Étage</td>
                            <td>{{ $property->floor ?: 'Rez de chaussé' }}</td>
                        </tr>
                        <tr>
                            <td>Localisation</td>
                            <td>
                                 {{ $property->address }}<br>
                                 {{ $property->city }} ({{ $property->postal_code }})
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <h2 class="mb-3">Options</h2>
                    <ul class="list-group">
                        @foreach ($property->options as $option )
                            <li class="list-group-item">{{ $option->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- TODO example: ajouter un badge sur la carte / le bien s'il est vendu --}}
