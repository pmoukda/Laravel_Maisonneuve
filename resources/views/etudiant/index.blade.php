@extends('layouts.app')
@section('title', trans('Students'))
@section('content')
    
<div class="container mt-5 py-2 px-3">
<h1 class="mb-4 text-center">@lang('lang.text_studentIndex_title')</h1>
<div class="row">
    @forelse($etudiants as $etudiant)
        <div class="col-sm-6 col-md-4">
            <div class="card shadow-lg mt-4">
                <div class="card-body text-dark rounded">
                    <h2 class="card-title fw-bold fs-4">{{ $etudiant->nom }}</h2>
                    <p class="card-text"> 
                        <strong>@lang('lang.text_studentIndex_city')</strong> {{ $etudiant->ville->nom }}
                    </p>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('etudiant.show', $etudiant->id) }}" class="align-self-end text-decoration-none">@lang('lang.text_studentIndex_link') <i class="bi bi-arrow-right-square-fill"></i></class></a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-primary text-center">
                @lang('lang.text_user_alert_msg!')
            </div>
        </div>
    @endforelse
</div>
    <div class=" d-flex justify-content-end mt-5">{{ $etudiants}}</div>
</div>  
@endsection('content')
