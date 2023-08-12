@extends('admin.base')

@section('title', $property->exists ? "Modifier un bien" : "Ajouter un bien")

@section('content')

    <h1 class="mb-5">@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="post">
        @csrf
        @method($property->exists ? 'put' : 'post')

        <div class="row">
            @include('shared.input', ['class'=>'col', 'label'=>'Titre', 'name'=>'title', 'value'=>$property->title])
            <div class="col row">
                @include('shared.input', ['class'=>'col', 'label'=>'Surface', 'name'=>'surface', 'value'=>$property->surface])
                @include('shared.input', ['class'=>'col', 'label'=>'Prix', 'name'=>'price', 'value'=>$property->price])
            </div>
        </div>
        @include('shared.input', ['class'=>'col', 'type'=>'textarea', 'label'=>'Description', 'name'=>'description', 'value'=>$property->description])
        <div class="row">
            @include('shared.input', ['class'=>'col', 'label'=>'Pièces', 'name'=>'rooms', 'value'=>$property->rooms])
            @include('shared.input', ['class'=>'col', 'label'=>'Chambres', 'name'=>'bedrooms', 'value'=>$property->bedrooms])
            @include('shared.input', ['class'=>'col', 'label'=>'Étage', 'name'=>'floor', 'value'=>$property->floor])
        </div>
        <div class="row">
            @include('shared.input', ['class'=>'col', 'label'=>'Adresse', 'name'=>'address', 'value'=>$property->address])
            @include('shared.input', ['class'=>'col', 'label'=>'Ville', 'name'=>'city', 'value'=>$property->city])
            @include('shared.input', ['class'=>'col', 'label'=>'Code postal', 'name'=>'postal_code', 'value'=>$property->postal_code])
        </div>
        @include('shared.checkbox', ['label'=>'Vendu ?', 'name'=>'sold', 'value'=>$property->sold])

        <div>
            <button class="btn btn-primary">
                @if ($property->exists)
                    Modifier
                @else
                    Ajouter
                @endif
            </button>
        </div>
    </form>

@endsection
