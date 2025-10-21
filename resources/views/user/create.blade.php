@extends('layouts.app')
@section('title', 'Registration')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <form action="{{ route('user.store')}}" method="post" class="bg-dark p-4 col-md-8 col-lg-6 border rounded-3 shadow-lg">
        @csrf
            <h1 class="text-warning text-center mb-4">Inscription</h1>
            @if (!$errors->isEmpty())
                <div class="text-danger">
                    <ul class="navbar-nav">
                        @foreach ($errors->all() as $error )
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group my-3">
                <label class="text-light mb-2" for="name">Nom</label>
                <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Votre nom">
            </div>
            <div class="form-group my-3">
                <label class=" text-light mb-2" for="email">Courriel </label>
                <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Votre courriel">
            </div>   
            <div class="form-group my-3">
                <label class="text-light mb-2" for="password">Mot de passe</label>
                <input class="form-control" type="password" id="pasword" name="password" placeholder="Entrez un mot de passe">
            </div>
            <div class="form-group my-3">
                <label class="text-light mb-2" for="password_confirmation">Reconfirmation du mot de passe</label>
                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="Entrer de nouveau le mot de passe">
            </div>
            <div class="form-group my-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="invalidCheck">
                    <label class="form-check-label fs-14 text-light" for="invalidCheck">Se souvenir de moi</label>
                    <a class="fs-14 row justify-content-center text-warning mt-2" href="#">Déjà un compte? Se connecter</a>
                </div>
            </div>
            <input class="btn btn-primary w-100 mt-4 fs-5" type="submit" value="S'incrire">
        </form>
    </div>   
</div>
@endsection('content')