@extends('layouts.app')
@section('title', trans('Show Student'))
@section('content')

<h1 class="text-center mt-5">@lang('lang.text_studentShow_title') <small>#{{ $etudiant->id }}</small> </h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-auto">
            <div class="card border-light shadow-lg mt-5">
                <div class="card-header bg-dark text-light">
                    <h2 class="card-title text-uppercase">{{ $etudiant->nom }}</h2>
                </div>
                <div class="card-body text-secondary">
                    <p class="card-text fs-5 text-dark"><small class="text-secondary">@lang('lang.text_info_address') </small>{{ $etudiant->adresse }}</p>
                    <p class="card-text fs-5 text-dark"><small class="text-secondary">@lang('lang.text_info_city') </small>{{ $etudiant->ville->nom }}</p>
                    <p class="card-text fs-5 text-dark"><small class="text-secondary">@lang('lang.text_info_email') </small>{{ $etudiant->email}}</p>
                    <p class="card-text fs-5 text-dark"><small class="text-secondary">@lang('lang.text_info_phone') </small>{{ $etudiant->telephone}}</p>
                    <p class="card-text fs-5 text-dark"><small class="text-secondary">@lang('lang.text_info_birthDate') </small>{{ $etudiant->date_de_naissance}}</p>
                    <p class="card-text fs-5 text-dark"><small class="text-secondary">@lang('lang.text_info_registrationDate') </small>{{ $etudiant->created_at->format('Y-m-d')}}</p>
                </div>
                <div class="card-footer bg-transparent d-flex justify-content-between mt-3 mb-3 border-0">
                    <a href="{{ route('etudiant.edit',$etudiant->id) }}" class="btn btn-warning fs-5"><i class="bi bi-pencil-square"></i></a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger fs-5" data-bs-toggle="modal" data-bs-target="#deleteModal">
                      <i class="bi bi-trash3"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog alert alert-danger" role="alert">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.text_Delete_btn') {{$etudiant->nom}}</h1>
        <button type="button" class="btn-close btn-danger " data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @lang('lang.text_studentDelete_msg') {{ $etudiant->nom }}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">@lang('lang.text_Cancel_btn')</button>
        <form action="{{ route('etudiant.destroy', $etudiant->id) }}" method="post">
           @csrf
            @method('delete')
            <input type="submit" value="@lang('lang.text_Delete_btn')" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection('content')