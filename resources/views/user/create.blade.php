@extends('layouts.app')
@section('title',trans('lang.text_registration_title'))
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <form action="{{ route('user.store')}}" method="post" class="bg-dark p-4 col-md-8 col-lg-6 border rounded-3 shadow-lg">
        @csrf
            <h1 class="text-warning text-center mb-4">@lang('lang.text_registration_title')</h1>
            @if (!$errors->isEmpty())
                <div class="text-danger">
                    <ul class="navbar-nav">
                        @foreach ($errors->all() as $error )
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group my-3">
                <label class="text-light mb-2" for="name">@lang('lang.text_form_name')</label>
                <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="@lang('lang.text_placeholder_name')">
            </div>
            <div class="form-group my-3">
                <label class=" text-light mb-2" for="email">@lang('lang.text_form_email')</label>
                <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" placeholder="@lang('lang.text_placeholder_email')">
            </div>   
            <div class="form-group my-3">
                <label class="text-light mb-2" for="password">@lang('lang.text_form_pw')</label>
                <input class="form-control" type="password" id="pasword" name="password" placeholder="@lang('lang.text_placeholder_pw')">
            </div>
            <div class="form-group my-3">
                <label class="text-light mb-2" for="password_confirmation">@lang('lang.text_form_confirm_pw')</label>
                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="@lang('lang.text_placeholder_confirm_pw')">
            </div>
            <div class="form-group mt-5">
                <a class="fs-14 row justify-content-center text-warning mt-2" href="{{ route('login') }}">@lang('lang.text_login_link')</a>
            </div>
            <input class="btn btn-primary w-100 mt-4 fs-5" type="submit" value="@lang('lang.text_registration_btn')">
        </form>
    </div>   
</div>
@endsection('content')