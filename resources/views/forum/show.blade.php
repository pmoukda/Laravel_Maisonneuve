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
        <p><strong>@lang('lang.published_at'):</strong> {{ $forum->published_at }}</p>
        <p><strong>@lang('lang.author'):</strong> {{ $forum->user->name }}</p>
    </div>
    <div class="d-flex justify-content-between mt-4">
        @auth
        <div>
           @if (auth()->id() === $forum->user_id )
                <a href="{{ route('forum.edit',$forum->id) }}" class="btn btn-warning fs-5 me-3"><i class="bi bi-pencil-square"></i></a>
                <form action="{{ route('forum.destroy', $forum) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger fs-5" >
                        <i class="bi bi-trash3"></i>
                    </button>
                </form>
            @endif 
        </div>
        @endauth
        <a href="{{ route('forum.index') }}" class="btn btn-outline-primary">@lang('lang.back_to_list')</a>
    </div>
</div>
@endsection('content')
