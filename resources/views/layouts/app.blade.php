<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Moukda Phaengvixay">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.6.6/css/flag-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">
    @php $locale = session()->get('locale'); @endphp
    <header>
        <ul class="nav justify-content-end align-items-center bg-primary px-4">
            @if($locale === 'en')
            <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="{{ route('lang', 'fr') }}">FR <img src="https://flagcdn.com/w40/fr.png" alt="Drapeau français" width="20" height="12" class="mb-1"></a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="{{ route('lang', 'en') }}">EN <img src="https://flagcdn.com/w40/gb.png" alt="Drapeau anglais" width="20" height="12" class="mb-1"></a>
            </li>
            @endif
             <div class="flex-lg-row">
                <form class="container-sm d-flex justify-content-center p-2" role="search">
                    <input class="form-control-sm" type="search" id="search" name="search" placeholder="@lang('lang.text_header_placeholder')" aria-label="Search">
                    <button class="btn btn-warning btn-sm btn-search" type="button" aria-label="Search">
                        <i class="fa-solid fa-magnifying-glass fa-lg"></i>
                    </button>
                </form>
            </div> 
        </ul>
        <nav class="navbar navbar-expand-md px-4 py-3">
            <div class="container-fluid">
                <div class="m-1 mr-20 ">
                    <a class="navbar-brand fw-bolder text-warning border border-2 p-1 shadow-lg" href="/">M<small class="fs-6">Collège</small></a> 
                </div>   
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarExample">
                    <ul class="navbar-nav me-auto gap-2">
                        <li class="nav-item">
                            <a class="nav-link text-white px-1 active" aria-current="page" href="/">@lang('Home')</a>
                        </li>
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white px-1" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">@lang('Students')</a>
                            <ul class="dropdown-menu border-0">
                                <li><a class="dropdown-item text-white" href="{{ route('etudiant.index') }}">@lang('Students list')</a></li>
                                <li><a class="dropdown-item text-white" href="{{ route('etudiant.create') }}">@lang('New student')</a></li>
                            </ul>
                        </li>
                        @endauth
                    </ul>
                    <ul class="navbar-nav gap-2">
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white px-1" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="bi bi-person-circle"></i> @lang('Member space') </a>
                            <ul class="dropdown-menu border-0">
                                <li><a class="dropdown-item text-white" href="{{ route('user.index') }}">@lang('The members')</a></li>
                                <li><a class="dropdown-item text-white" href="{{ route('forum.index') }}">@lang('Forum')</a></li>
                                <li><a class="dropdown-item text-white" href="{{route('forum.create')}}">@lang('Create a forum')</a></li>
                                <li><a class="dropdown-item text-white" href="{{route('folder.create')}}">@lang('Add file')</a></li>
                                <li><a class="dropdown-item text-white" href="{{route('folder.index')}}">@lang('Files directory')</a></li>
                            </ul>
                        </li>
                        @endauth
                          <li class="nav-item">
                            <a class="nav-link text-white px-1" aria-current="page" href="{{ route('user.create') }}">@lang("Sign up")</a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link text-white bg-primary rounded text-center px-2" aria-current="page" href="{{ route('login') }}">@lang('Login')</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link text-white bg-primary rounded text-center
                            px-2" aria-current="page" href="{{ route('logout') }}">@lang('Logout')</a>
                        </li>
                        @endguest
                    </ul>   
                </div>
            </div>
        </nav>
    </header>
    <main class="flex-grow-1">
        @unless(Route::is('home', 'user.create'))
            <section class="px-4 pt-4">
                @auth
                    <p class="fs-5 text-end"><strong><i>@lang("lang.text_login_welcome") {{  Auth::user()->name }} !</i></strong></p>
                @else
                    <p class="fs-5 text-center alert alert-warning col-md-6 mx-auto" role="alert"><strong>@lang("lang.text_login_msg")</strong></p>
                @endauth
            </section>
        @endunless
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-4 text-center fs-5 col-8 mx-auto" role="alert">
                {{ session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @yield('content')
    </main>
    <footer class="text-light text-center p-2 mt-5">
        <p class="mb-0 fs-14">
            &copy; @lang("lang.text_footer")
        </p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>