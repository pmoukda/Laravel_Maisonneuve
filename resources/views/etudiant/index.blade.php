@extends('layouts.app')
@section('title', 'Index Etudiants ')
@section('content')
    
<div class="container mt-5">
<h1 class="mb-4 text-center">Les étudiants de Maisonneuve</h1>
<div class="row">
    @forelse($etudiants as $etudiant)
        <div class="col-md-3 mb-4">
            <div class="card shadow-lg mt-4">
                <div class="card-body text-dark rounded">
                    <h2 class="card-title fw-bold fs-4">{{ $etudiant->nom }}</h2>
                    <p class="card-text"> 
                        <strong>Ville:</strong> {{ $etudiant->ville->nom }}
                    </p>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('etudiant.show', $etudiant->id) }}" class="align-self-end text-decoration-none">Voir profil <i class="bi bi-arrow-right-square-fill"></i></class></a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-primary text-center">
                Aucun étudiant trouvé!
            </div>
        </div>
    @endforelse
</div>
    <div class=" d-flex justify-content-end mt-5">{{ $etudiants}}</div>
</div>  
@endsection('content')
