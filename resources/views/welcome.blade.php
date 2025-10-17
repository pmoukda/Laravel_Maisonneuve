@extends('layouts.app')
@section('title', 'Home')
@section('content')
<section class="hero-container">
  <img class="img-fluid w-100" src="./img/students.jpg" alt="students">
  <div class=" container hero-text text-md-start">
    <h1 class="">Mconnect</h1>
    <h2 class="fst-italic">Le réseau social des élèves du collège</h2>
    <div class="d-flex justify-content-start mt-4">
      <a href="{{ route('etudiant.index') }}" class="btn bg-warning btn-md ">Voir les étudiants participants</a>
    </div>
  </div>
</section>
<section class="container mt-5">
  <h2>Actualités récentes</h2>
  <div class="row">
    <!-- Carte 1 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="./img/science.jpg" class="card-img-top" alt="Scientific project">
        <div class="card-body d-flex flex-column">
          <h3 class="card-title fs-4">Projet étudiant en robotique</h3>
          <p class="card-text">Des étudiants du programme Technologie du génie électrique ont conçu un robot autonome pour une compétition intercollégiale</p>
          <div class="mt-auto">
            <a href="#" class="btn btn-primary btn-sm">Lire plus</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Carte 2 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="./img/programming.jpg" class="card-img-top" alt="IT internship">
        <div class="card-body d-flex flex-column">
          <h3 class="card-title fs-4">Nouveau partenariat de stages</h3>
          <p class="card-text">Le Cégep signe une entente avec Ubisoft pour offrir des stages en développement de jeux vidéo aux étudiants en informatique.</p>
          <div class="mt-auto">
            <a href="#" class="btn btn-primary btn-sm">Lire plus</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Carte 3 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="./img/open-doors-day.jpg" class="card-img-top" alt="Open doors day">
        <div class="card-body d-flex flex-column">
          <h3 class="card-title fs-4">Journée portes ouvertes</h3>
          <p class="card-text">
            Venez découvrir notre collège le samedi 25 novembre à partir de 9h. Équipes pédagogiques, animations, et plus !
          </p>
          <div class="mt-auto">
            <a href="#" class="btn btn-primary btn-sm">Lire plus</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Galerie -->
  <div class="mt-5">
    <h2>Galerie</h2>
    <div class="grid text-center">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2">
        <div class="col-md-4">
          <div class="image-hover-box"></div>
          <img class="img-fluid" src="./img/basketball-tournement.jpg" alt="Basketball tournement">
        </div>
        <div class="col"><img class="img-fluid" src="./img/ballet-club.jpg" alt="Ballet club"></div>
        <div class="col"><img class="img-fluid" src="./img/homework-club.jpg" alt="Homework club"></div>
        <div class="col"><img class="img-fluid" src="./img/chess-tournament.jpg" alt="Chess tournement"></div>
        <div class="col"><img class="img-fluid" src="./img/graduation.jpg" alt="Graduation"></div>
        <div class="col"><img class="img-fluid" src="./img/library.jpg" alt="Library"></div>
        <div class="col"><img class="img-fluid" src="./img/athletics.jpg" alt="Athletics"></div>
        <div class="col"><img class="img-fluid" src="./img/cafeteria.jpg" alt="Cafeteria"></div>
      </div>
    </div>
  </div>
</section>
@endsection('content')