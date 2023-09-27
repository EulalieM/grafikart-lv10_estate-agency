@extends(('default.base'))

@section('title', 'Accueil')

@section('content')

    {{-- <x-alert type="success" class="fw-bold">
        Infos
    </x-alert> --}}

    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Agende Graf'Immo</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet arcu risus. Vivamus tristique felis ut
                fermentum imperdiet. Nam mollis a leo eu dignissim. Integer facilisis dolor vitae maximus bibendum. Sed ac
                efficitur enim, id hendrerit arcu. Nulla neque mi, posuere sit amet sem maximus, suscipit lobortis dolor.
            </p>
        </div>
    </div>

    <div class="container">
        <h2 class="mb-4">Nos derniers biens</h2>
        <div class="row">
            @foreach ($properties as $property)
            <div class="col">
                @include('property.card')
            </div>
            @endforeach
        </div>
    </div>

@endsection
