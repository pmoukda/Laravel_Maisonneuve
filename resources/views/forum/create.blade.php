@extends('layouts.app')
@section('title', 'Forum Create')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <form action="{{ route('forum.store')}}" method="post" class="bg-dark p-4 col-md-8 col-lg-6 border rounded-3 shadow-lg">
        @csrf
            <h1 class="text-warning text-center mb-4">@lang('lang.text_forum_title')</h1>
            @if (!$errors->isEmpty())
                <div class="text-danger">
                    <ul class="navbar-nav">
                        @foreach ($errors->all() as $error )
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <fieldset>
                <legend class="text-white fs-6">Langue de publication</legend>
                <select class="form-select mb-3" name="language" id="language" required>
                    <option value="fr" {{ old('language') == 'fr' ? 'selected' : '' }}>@lang('lang.lang_fr')</option>
                    <option value="en" {{ old('language') == 'en' ? 'selected' : '' }}>@lang('lang.lang_en')</option>
                </select>
                <legend class="text-light">Contenu en anglais</legend>
                <div class="form-group my-3">
                    <label class="text-light mb-2" for="title_en">@lang('lang.text_form_title')</label>
                    <input class="form-control" type="text" id="title_en" name="title_en" value="{{ old('title_en') }}">
                </div>
                <div class="form-group my-3">
                    <label class="text-light mb-2" for="content_en">@lang('lang.text_form_content')</label>
                    <textarea class="form-control" rows="10" id="content_en" name="content_en">{{ old('content_en') }}</textarea>
                </div>
                <legend class="text-light">Contenu en français</legend>
                <div class="form-group my-3">
                    <label class="text-light mb-2" for="title_fr">@lang('lang.text_form_title')</label>
                    <input class="form-control" type="text" id="title_fr" name="title_fr" value="{{ old('title_fr') }}">
                </div>
                <div class="form-group my-3">
                    <label class="text-light mb-2" for="content_fr">@lang('lang.text_form_content')</label>
                    <textarea class="form-control" rows="10" id="content_fr" name="content_fr">{{ old('content_fr') }}</textarea>
                </div>
                <div class="form-group my-3">
                    <label class="text-light mb-2" for="published_at">@lang('lang.published_at')</label>
                    <input class="form-control" type="date" id="published_at" name="published_at" value="{{ old('published_at') }}">
                </div>
            </fieldset>

            <input class="btn btn-primary w-100 mt-4 fs-5" type="submit" value="@lang('lang.text_published_btn')">
        </form>
    </div>   
</div>   
@endsection('content')