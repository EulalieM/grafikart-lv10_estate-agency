@extends('admin.base')

@section('title', $option->exists ? "Modifier une option" : "Ajouter une option")

@section('content')

    <h1 class="mb-5">@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}" method="post">
        @csrf
        @method($option->exists ? 'put' : 'post')

        @include('shared.input', ['class'=>'col', 'label'=>'Nom', 'name'=>'name', 'value'=>$option->name])

        <div>
            <button class="btn btn-primary">
                @if ($option->exists)
                    Modifier
                @else
                    Ajouter
                @endif
            </button>
        </div>
    </form>

@endsection
