@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="container  mt-5">
  <h1 class="text-center">Mconnect</h1>
  <h2 class="text-center fst-italic">Le réseau social des élèves du collège</h2>
  <div class="row justify-content-center mt-3 g-4">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header bg-secondary text-white">Dernières actualités</div>
        <div class="card-body">
          <ul>
            <li><strong>02/10 :</strong> Lancement du club théâtre </li>
            <li><strong>30/09 :</strong> Résultats du cross du collège </li>
            <li><strong>28/09 :</strong> Nouveau groupe “Jeux & code”</li>
          </ul>
          <div class="d-flex justify-content-end">
            <a href="{{ route('etudiant.index') }}" class="btn btn-outline-primary btn-sm">Voir les étudiants intéressés</a>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection('content')