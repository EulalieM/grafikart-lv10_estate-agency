@extends('base')

@section('title', 'Se connecter')

@section('content')

    <h1 class="mb-5">Se connecter</h1>

    <div class="row">
        <div class="col col-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('auth.login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email*</label> <br>
                            <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}">
                            @error("email")
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Mot de passe*</label> <br>
                            <input class="form-control" type="password" id="password" name="password">
                            @error("password")
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <button class="btn btn-primary mt-3">Se connecter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
