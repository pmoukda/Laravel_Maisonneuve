@extends('layouts.app')
@section('title','Show Forum')
@section('content')

<div class="container">
    <h1 class="mb-4">@lang('lang.forum_details')</h1>
    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
            <strong>@lang('lang.text_form_content') ({{ strtoupper($lang) }})</strong>
        </div>
        <div class="card-body">
            <h2>{{ $forum->title[$lang] }}</h2>
            <p class="mt-3">{{ $forum->content[$lang] }}</p>
        </div>
    </div>
    <div class="mb-3">
        <p><strong>@lang('lang.published_at'):</strong> {{ $forum->published_date }}</p>
        <p><strong>@lang('lang.author'):</strong> {{ $forum->user->name }}</p>
    </div>
    <div class="d-flex justify-content-between mt-4">
        @auth
        <div>
           @if (auth()->id() === $forum->user_id )
                <a href="{{ route('forum.edit',$forum->id) }}" class="btn btn-warning fs-5 me-3"><i class="bi bi-pencil-square"></i></a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger fs-5" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    <i class="bi bi-trash3"></i>
                </button>
            @endif 
        </div>
        @endauth
        <a href="{{ route('forum.index') }}" class="btn btn-outline-primary">@lang('lang.back_to_list')</a>
    </div>
</div>
<!-- modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog alert alert-danger" role="alert">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.text_Delete_btn') {{$forum->title[$lang]}}</h1>
        <button type="button" class="btn-close btn-danger " data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @lang('lang.text_DeleteForum_msg')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">@lang('lang.text_Cancel_btn')</button>
        <form action="{{ route('etudiant.destroy', $forum->id) }}" method="post">
           @csrf
            @method('delete')
            <input type="submit" value="@lang('lang.text_Delete_btn')" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection('content')
