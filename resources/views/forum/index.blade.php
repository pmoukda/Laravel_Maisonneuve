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
            <p><i class="fa-solid fa-user"></i> {{ $forum->user->name }}</p>
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
                    <form action="{{ route('forum.destroy', $forum) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">@lang('lang.text_Delete_btn')</button>
                    </form>
                @endif
            @endauth
        </div>
    @empty
        <p>@lang('lang.error_forum_msg')</p>
    @endforelse
    <div class="d-flex justify-content-end mt-5">{{ $forums->links()}}</div>
</div>
@endsection
