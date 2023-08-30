@extends(('default.base'))

@section('title', 'Connexion')

@section('content')

    <div class="my-5 container">
        <h1 class="mb-4">@yield('title')</h1>

        <div class="row">
            <div class="col-6">
                @include('shared.flash')
                <form action="{{ route('login') }}" method="post" class="vstack gap-3">
                    @csrf
                    @include('shared.input', ['label'=>'Email', 'name'=>'email', 'type'=>'email'])
                    @include('shared.input', ['label'=>'Mot de passe', 'name'=>'password', 'type'=>'password'])
                    <div>
                        <button class="btn btn-primary">Connexion</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
