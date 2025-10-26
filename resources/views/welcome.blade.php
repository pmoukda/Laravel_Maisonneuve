@extends('layouts.app')
@section('title', trans('Home'))
@section('content')
<section class="hero-container">
  <img class="img-fluid w-100" src="./img/students.jpg" alt="students">
  <div class=" container hero-text text-md-start">
    <h1 class="">@lang("lang.text_header_name")</h1>
    <h2 class="fst-italic">@lang("lang.text_header_title")</h2>
    <div class="d-flex justify-content-start mt-4">
      <a href="{{ route('etudiant.index') }}" class="btn bg-warning btn-md ">@lang("lang.text_header_button")</a>
    </div>
  </div>@lang("lang.")
</section>
<section class="container mt-5">
  <h2>@lang("lang.text_sectionActuality_title")</h2>
  <div class="row">
    <!-- Carte 1 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="./img/science.jpg" class="card-img-top" alt="Scientific project">
        <div class="card-body d-flex flex-column">
          <h3 class="card-title fs-4">@lang("lang.text_card1_title")</h3>
          <p class="card-text">@lang("lang.text_card1_paragraph")</p>
          <div class="mt-auto">
            <a href="#" class="btn btn-primary btn-sm">@lang("lang.text_card_btn")</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Carte 2 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="./img/programming.jpg" class="card-img-top" alt="IT internship">
        <div class="card-body d-flex flex-column">
          <h3 class="card-title fs-4">@lang("lang.text_card2_title")s</h3>
          <p class="card-text">@lang("lang.text_card2_paragraph")</p>
          <div class="mt-auto">
            <a href="#" class="btn btn-primary btn-sm">@lang("lang.text_card_btn")</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Carte 3 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="./img/open-doors-day.jpg" class="card-img-top" alt="Open doors day">
        <div class="card-body d-flex flex-column">
          <h3 class="card-title fs-4">@lang("lang.text_card3_title")</h3>
          <p class="card-text">
            @lang("lang.text_card3_paragraph")
          </p>
          <div class="mt-auto">
            <a href="#" class="btn btn-primary btn-sm">@lang("lang.text_card_btn")</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Galerie -->
  <div class="mt-5">
    <h2>@lang("lang.text_sectionGallery_title")</h2>
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