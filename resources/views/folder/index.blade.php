@extends('layouts.app')
@section('title', trans('Floders'))
@section('content')

<div class="container mx-auto">
    <h1 class="text-center p-5">@lang('lang.text_folderIndex_title')</h1>
    <table class="table table-dark table-striped text-light">
        <thead class="table table-dark fs-5">
            <tr>
                <th class="col-md-5 px-4">@lang('lang.text_folderTable_title')</th>
                <th class="col-md-5">@lang('lang.text_folderTable_user_name')</th>
                <th class="col-md-5">@lang('lang.text_folderTable_link')</th>',
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @forelse ($folders as $folder )
            <tr>
                <td class="px-4">{{ $folder->title }}</td>
                <td>{{ $folder->user->name }}</td>
                <td><a href="{{ route('folder.show', $folder->id) }}">@lang('lang.text_folderTable_body')</a></td>
            </tr>
            @empty
            <div class="alert alert-warning mb-4 text-center fs-4">
               @lang('lang.text_folder_alert_msg')
            </div>
            @endforelse
        </tbody>
    </table> 
</div>   
@endsection('content')