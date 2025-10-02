<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
       
</head>
<body class="d-flex flex-column min-vh-100 bg-light bg-gradient">
    <header>
        <nav class="navbar navbar-expand-lg bg-primary p-2  ">
          <div class="container-fluid">
              <a class="navbar-brand fw-bolder text-warning" href="/">M<small class="fs-6">Collège</small></a>    
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample">
                <ul class="navbar-nav me-auto mb-0 text-center">
                    <li class="nav-item">
                        <a class="nav-link text-light active" aria-current="page" href="/">Accueil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light " href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">Étudiants</a>
                        <ul class="dropdown-menu text-center bg-primary border-0">
                            <li><a class="dropdown-item text-light" href="{{ route('etudiant.index') }}">Liste des étudiants</a></li>
                            <li><a class="dropdown-item text-light" href="{{ route('etudiant.create') }}">Nouvel Étudiant</a></li>
                        </ul>
                    </li>
                    </ul>
                    <ul class="navbar-nav mb-0 text-center">
                        <li class="nav-item">
                            <a class="nav-link text-light" aria-current="page" href="#">Se connecter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" aria-current="page" href="#">FR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" aria-current="page" href="#">EN</a>
                        </li>
                    </ul> 
                    <div class="d-flex align-items-center flex-lg-row">
                        <form class="container-sm d-flex"; role="search">
                           <input class="form-control-sm " type="search"
                            placeholder="Recherche..."
                            aria-label="Search">
                           <button class="btn btn-dark btn-sm" type="submit">
                             <i class="fa-solid fa-magnifying-glass fa-lg"></i>
                           </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="container flex-grow-1">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-4 text-center fs-5" role="alert">
                {{ session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @yield('content')
    </main>
    <footer class="bg-dark text-light text-center p-2 mt-5">
        <p>
            &copy; Laravel-TP1.Tous droits réservés.
        </p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>