<!DOCTYPE html>
<html lang="en">
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
    <header>
        <ul class="nav justify-content-end bg-primary px-3">
            <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="#">FR <img src="https://flagcdn.com/w40/fr.png" alt="Drapeau français" width="20" height="12" class="mb-1"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="#">EN <img src="https://flagcdn.com/w40/gb.png" alt="Drapeau anglais" width="20" height="12" class="mb-1"></a>
            </li>
        </ul>
        <nav class="navbar navbar-expand-md p-2  ">
            <div class="container-fluid">
                <div class="m-2 mr-20 ">
                    <a class="navbar-brand fw-bolder text-warning border border-2 p-1 shadow-lg" href="/">M<small class="fs-6">Collège</small></a> 
                </div>   
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarExample">
                    <ul class="navbar-nav me-auto mb-0">
                        <li class="nav-item">
                            <a class="nav-link text-white active" aria-current="page" href="/">Accueil</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">Étudiants</a>
                            <ul class="dropdown-menu border-0">
                                <li><a class="dropdown-item text-white" href="{{ route('etudiant.index') }}">Liste des étudiants</a></li>
                                <li><a class="dropdown-item text-white" href="{{ route('etudiant.create') }}">Nouvel Étudiant</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav mb-0">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="{{ route('user.create') }}">S'inscrire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="">Se connecter</a>
                        </li>
                    </ul> 
                    <div class="flex-lg-row">
                        <form class="container-sm d-flex justify-content-center p-2" role="search">
                            <input class="form-control-sm" type="search" id="search" name="search" placeholder="Recherche..." aria-label="Search">
                            <button class="btn btn-warning btn-sm btn-search" type="button" aria-label="Search">
                                <i class="fa-solid fa-magnifying-glass fa-lg"></i>
                            </button>
                        </form>
                    </div>      
                </div>
            </div>
        </nav>
    </header>
    <main class="flex-grow-1">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-4 text-center fs-5" role="alert">
                {{ session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @yield('content')
    </main>
    <footer class="text-light text-center p-2 mt-5">
        <p class="mb-0 fs-14">
            &copy; Laravel-TP2.Tous droits réservés.
        </p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>