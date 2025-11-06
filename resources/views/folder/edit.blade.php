@extends('layouts.app')
@section('title', 'Edit file')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <form action="{{ route('folder.update', $folder->id)}}" method="post" enctype="multipart/form-data" class="bg-dark p-4 col-md-8 col-lg-6 border rounded-3 shadow-lg">
            @method('put')
            @csrf
            <h1 class="text-warning text-center mb-4">@lang('lang.text_Editfolder_title')</h1>
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
                <legend class="text-white fs-6">@lang('lang.text_legend_lang')</legend>
                <select class="form-select mb-3" name="language" id="language" required>
                    <option value="fr" {{ old('language', $folder->language) == 'fr' ? 'selected' : '' }}>@lang('lang.lang_fr')</option>
                    <option value="en" {{ old('language',$folder->language) == 'en' ? 'selected' : '' }}>@lang('lang.lang_en')</option>
                </select>
                <div class="form-group my-3">
                    <label class="text-light mb-2" for="title_en">{{ ucfirst(__('lang.title_en')) }}</label>
                    <input class="form-control" type="text" id="title_en" name="title_en" value="{{ old('title_en',$folder->title['en']) }}">
                </div>
                <div class="form-group my-3">
                    <label class="text-light mb-2" for="title_fr">{{ ucfirst(__('lang.title_fr')) }}</label>
                    <input class="form-control" type="text" id="title_fr" name="title_fr" value="{{ old('title_fr', $folder->title['fr']) }}">
                </div>
                 <div class="form-group my-3">
                    <label class="text-light mb-2" for="path">@lang('lang.text_form_doc')</label>
                    <input type="file" accept=".pdf, .zip, .doc, .docx" class="form-control" id="path" name="path">
                </div>
                <div class="form-group my-3">
                    <label class="text-light mb-2" for="published_at">@lang('lang.published_at')</label>
                    <input class="form-control" type="date" id="published_at" name="published_at" value="{{ old('published_at', $folder->published_date) }}">
                </div>
            </fieldset>

            <input class="btn btn-primary w-100 mt-4 fs-5" type="submit" value="@lang('lang.text_Edit_btn')">
        </form>
    </div>   
</div>   
@endsection('content')