@extends('layouts.app')
@section('title', trans('Users'))
@section('content')

<div class="container mx-auto">
    <h1 class="text-center p-5">@lang('lang.text_userIndex_title')</h1>
    <table class="table table-dark table-striped text-light">
        <thead class="table table-dark fs-5">
            <tr>
                @lang('lang.text_userTable_head')
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @forelse ($users as $user )
            <tr>
                <td class="px-4">{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><a href="{{ route('forum.show', $user->id) }}">@lang('lang.text_userTable_body')</a></td>
            </tr>
            @empty
            <div class="alert alert-warning mb-4 text-center fs-4">
               @lang('lang.text_user_alert_msg')
            </div>
            @endforelse
        </tbody>
    </table> 
</div>   
@endsection('content')