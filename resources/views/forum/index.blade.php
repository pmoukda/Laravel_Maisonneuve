@extends('layouts.app')
@section('title', 'Forum')
@section('content')

<div class="container mt-5">
    <header class="text-dark-blue">
        <h1>@lang('lang.text_forum_welcome')</h1>
        <p>@lang('lang.text_forum_paragraph')</p>
    </header>
    @forelse($forums as $forum)
        <div class="forum-card mb-4 mt-5 p-3 border rounded shadow-sm bg-white">
            <div class="d-flex justify-content-between">
                <p><i class="fa-solid fa-user"></i> {{ $forum->user->name }}</p>
                <p> {{ $forum->published_date }}</p>
            </div>
            <h2 class="fs-5">{{ $forum->title[$forum->language] }}</h2>
            <p>{{ $forum->short_content}}</p>
            <a href="{{ route('forum.show', $forum) }}">@lang('lang.text_seeMore_btn')</a>

            <div class="d-flex gap-4 justify-content-end">
                <a href="#"><i class="fa-solid fa-comments"></i></a>
                <i class="fa-solid fa-thumbs-up cursor-pointer"></i>
                <i class="fa-solid fa-thumbs-down cursor-pointer"></i>
                <i class="fa-solid fa-share cursor-pointer"></i>
            </div>
            @auth
                @if (auth()->id() === $forum->user_id)
                    <a href="{{ route('forum.edit', $forum) }}" class="btn btn-sm btn-warning">@lang('lang.text_Edit_btn')</a>
                    <!-- Button trigger modal -->
                    <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        @lang('lang.text_Delete_btn')
                    </button>
                @endif
            @endauth
        </div>
    @empty
        <p>@lang('lang.error_forum_msg')</p>
    @endforelse
    <div class="d-flex justify-content-end mt-5">{{ $forums->links()}}</div>
</div>
<!-- modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog alert alert-danger" role="alert">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.text_Delete_btn') {{$forum->title_language}}</h1>
        <button type="button" class="btn-close btn-danger " data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @lang('lang.text_DeleteForum_msg')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">@lang('lang.text_Cancel_btn')</button>
        <form action="{{ route('forum.destroy', $forum->id) }}" method="post">
           @csrf
            @method('delete')
            <input type="submit" value="@lang('lang.text_Delete_btn')" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
