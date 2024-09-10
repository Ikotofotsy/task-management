<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    {{-- @vite(['resources/js/app.js', 'resources/css/app.css']) --}}
    <link rel="stylesheet" href="{{ asset('css/styleTasks.css') }}">


    <title>@yield('title') | Tsisy Atao by TNR</title>
</head>
<body>
    <div class="container-fuild">
        <nav class="navbar navbar-expand-lg bg-secondary-subtle">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a href="{{ route('tasks') }}" class="navbar-brand nav-link active">
                        TNR | Tsisy Atao
                    </a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <span class="nav-link" data-bs-toggle="modal" data-bs-target="#add_form">
                                <i class="bi bi-patch-plus"></i> Nouvelle tache
                            </span>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="{{ route('logout') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="register-btn btn btn-outline-dark" type="submit">{{ $user->name }} | Se deconnecter <i class="bi bi-box-arrow-right"></i> </button>
                    </form>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
</body>
</html>