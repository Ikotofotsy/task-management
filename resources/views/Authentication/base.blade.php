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
    
    {{-- @vite(['resources/js/app.js', 'resources/css/app.css']) --}}
    <link rel="stylesheet" href="{{ asset('css/styleRegister.css') }}">

    <title>@yield('title') | Task Management by TNR</title>
</head>
<body>
    @php
        $route = request()->route()->getName();
        $route = ($route == 'registerPage' ) ? 'loginPage': 'registerPage' ;
        $btn_mssg = ($route == 'registerPage' ) ? 'S\'inscrire': 'Se connecter' ;
    @endphp

    <div class="container-fuild">
        <nav class="navbar navbar-expand-lg bg-secondary-subtle">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo01">
                    <a href="{{ route('tasks') }}" class="navbar-brand nav-link active">
                        TNR | Tsisy Atao
                    </a>
                    <div class="d-flex">
                        <a href="{{ route($route) }}" class="register-btn btn btn-outline-dark">{{ $btn_mssg }}</a>
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')

    </div>

</body>
</html>