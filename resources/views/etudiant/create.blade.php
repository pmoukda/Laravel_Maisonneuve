@extends('layouts.app')
@section('title', 'Create Etudiant')
@section('content')

<div class="container-sm mt-5">
    <h1 class="text-center">@lang('lang.text_studentAdd_title')</h1>
    <div class="row justify-content-center">
        <form action="{{ route('etudiant.store') }}" method="post" class="rounded-3 bg-dark shadow-lg p-4 mt-2 col-md-12 col-lg-8">
        @csrf
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label for="nom" class="form-label text-light">@lang('lang.text_student_name')</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="@lang('lang.text_placeholder_name')" value="{{ old('nom') }}">
                    @if ($errors-> has('nom'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('nom') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="adresse" class="form-label text-light">@lang('lang.text_student_address')</label>
                    <input type="text" class="form-control" id="adresse" name="adresse" placeholder="@lang('lang.text_placeholder_address')" value="{{ old('adresse') }}">
                    @if ($errors-> has('adresse'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('adresse') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label text-light"> @lang('lang.text_form_email')</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="@lang('lang.text_placeholder_emailExample')" value="{{ old('email') }}">
                    @if ($errors-> has('email'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="telephone" class="form-label text-light">@lang('lang.text_student_phone')</label>
                    <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="@lang('lang.text_placeholder_phone')" value="{{ old('telephone') }}">
                    @if ($errors-> has('telephone'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('telephone') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label for="date_de_naissance" class="form-label text-light">@lang('lang.text_student_birthDate')</label>
                    <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" value="{{ old('date_de_naissance') }}">
                    @if ($errors-> has('date_de_naissance'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('date_de_naissance') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="ville" class="form-label text-light">@lang('lang.text_student_city')</label>
                @if ($villes->isNotEmpty())
                    <select class="form-select" id="ville" name="ville_id">
                        <option selected disabled>@lang('lang.text_student_select_city')</option>
                    @foreach($villes as $ville)
                        <option value="{{ $ville->id }}" 
                        {{ old('ville_id') == $ville->id ? 'selected' : '' }}>
                        {{ $ville->nom }}
                        </option>
                    @endforeach
                    </select>
                    @else
                        <div class="alert alert-warning">@lang('lang.text_student_alert_msg')</div>
                    @endif
                    @if ($errors-> has('ville_id'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('ville_id') }}
                        </div>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn bg-primary text-light bg-gradient mt-5 fs-5 fw-bold mx-auto d-block w-100 ">@lang('lang.text_studentAdd_btn')</button>
        </form> 
    </div>
</div>

@endsection('content')




