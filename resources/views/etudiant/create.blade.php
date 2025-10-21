@extends('layouts.app')
@section('title', 'Create Etudiant')
@section('content')

<div class="container-sm mt-5">
    <h1 class="text-center">Ajouter un nouvel étudiant</h1>
    <div class="row justify-content-center">
        <form action="{{ route('etudiant.store') }}" method="post" class="rounded-3 bg-dark shadow-lg p-4 mt-2 col-md-12 col-lg-8">
        @csrf
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label for="nom" class="form-label text-light">Nom complet</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom" value="{{ old('nom') }}">
                    @if ($errors-> has('nom'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('nom') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="adresse" class="form-label text-light">Adresse</label>
                    <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Votre adresse" value="{{ old('adresse') }}">
                    @if ($errors-> has('adresse'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('adresse') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label text-light"> Adresse e-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="nom@abc.com" value="{{ old('email') }}">
                    @if ($errors-> has('email'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="telephone" class="form-label text-light">Numéro de téléphone</label>
                    <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="votre téléphone" value="{{ old('telephone') }}">
                    @if ($errors-> has('telephone'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('telephone') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label for="date_de_naissance" class="form-label text-light">Date de naissance</label>
                    <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" value="{{ old('date_de_naissance') }}">
                    @if ($errors-> has('date_de_naissance'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('date_de_naissance') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="ville" class="form-label text-light">Ville</label>
                @if ($villes->isNotEmpty())
                    <select class="form-select" id="ville" name="ville_id">
                        <option selected disabled>Choisir une ville</option>
                    @foreach($villes as $ville)
                        <option value="{{ $ville->id }}" 
                        {{ old('ville_id') == $ville->id ? 'selected' : '' }}>
                        {{ $ville->nom }}
                        </option>
                    @endforeach
                    </select>
                    @else
                        <div class="alert alert-warning">Aucune ville n’a été trouvée!</div>
                    @endif
                    @if ($errors-> has('ville_id'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('ville_id') }}
                        </div>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn bg-primary bg-gradient mt-5 fs-5 fw-bold mx-auto d-block w-100 ">Ajouter</button>
        </form> 
    </div>
</div>

@endsection('content')




