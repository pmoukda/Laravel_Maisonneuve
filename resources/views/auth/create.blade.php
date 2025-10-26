@extends('layouts.app')
@section('title', trans('Login'))
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <form action="{{ route('login.store')}}" method="post" class="bg-dark p-4 col-md-8 col-lg-6 border rounded-3 shadow-lg">
        @csrf
            <h1 class="text-warning text-center mb-4">@lang('lang.text_login_title')</h1>
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
                <label class=" text-light mb-2" for="email">@lang('lang.text_form_login_email')</label>
                <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}">
            </div>   
            <div class="form-group my-3">
                <label class="text-light mb-2" for="password">@lang('lang.text_form_pw')</label>
                <input class="form-control" type="password" id="pasword" name="password">
            </div>
            <div class="form-group my-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="invalidCheck">
                    <label class="form-check-label fs-14 text-light" for="invalidCheck">@lang('lang.text_rememberMe')</label>
                    <a class="fs-14 row justify-content-center text-warning mt-2" href="{{ route('user.create') }}">@lang('lang.text_link_registration')</a>
                </div>
            </div>
            <input class="btn btn-primary w-100 mt-4 fs-5" type="submit" value="@lang('lang.text_login_btn')">
        </form>
    </div>   
</div>

@endsection('content')