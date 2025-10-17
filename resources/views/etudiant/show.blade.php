@extends('layouts.app')
@section('title', 'Show Etudiant')
@section('content')

<h1 class="text-center mt-5">L'étudiant <small>#{{ $etudiant->id }}</small> </h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-auto">
            <div class="card border-light shadow-lg mt-5">
                <div class="card-header bg-dark text-light">
                    <h2 class="card-title text-uppercase">{{ $etudiant->nom }}</h2>
                </div>
                <div class="card-body text-secondary">
                    <p class="card-text fs-5 text-dark"><small class="text-secondary">Adresse: </small>{{ $etudiant->adresse }}</p>
                    <p class="card-text fs-5 text-dark"><small class="text-secondary">Ville: </small>{{ $etudiant->ville->nom }}</p>
                    <p class="card-text fs-5 text-dark"><small class="text-secondary">Courriel: </small>{{ $etudiant->email}}</p>
                    <p class="card-text fs-5 text-dark"><small class="text-secondary">Numéro de téléphone: </small>{{ $etudiant->telephone}}</p>
                    <p class="card-text fs-5 text-dark"><small class="text-secondary">Date de naissance: </small>{{ $etudiant->date_de_naissance}}</p>
                    <p class="card-text fs-5 text-dark"><small class="text-secondary">Date d'inscription: </small>{{ $etudiant->created_at->format('Y-m-d')}}</p>
                </div>
                <div class="card-footer bg-transparent d-flex justify-content-between mt-3 mb-3 border-0">
                    <a href="{{ route('etudiant.edit',$etudiant->id) }}" class="btn btn-warning fs-5">Edit</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger fs-5" data-bs-toggle="modal" data-bs-target="#deleteModal">
                      Supprimer
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"> Supprimer {{$etudiant->nom}}</h1>
        <button type="button" class="btn-close btn-danger " data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment supprimer l'étudiant: {{ $etudiant->nom }}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Annuler</button>
        <form action="{{ route('etudiant.destroy', $etudiant->id) }}" method="post">
           @csrf
            @method('delete')
            <input type="submit" value="Supprimer" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection('content')