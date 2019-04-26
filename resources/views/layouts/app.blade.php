<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GAC Clapiers</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!---JS----->

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel navbar-fixed-top">
        <div class="container col-sm-12">
            <a class="navbar-brand" href="#">
                <img src="http://localhost/GAC3/resources/images/logo.png">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @guest
                    <a class="nav-link dropdown-toggle text-black-50" href="#" id="navbarDropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="http://localhost/GAC2/public/">Accueil</a>
                                <a class="dropdown-item" href="#">BabyGym</a>
                                <a class="dropdown-item" href="#">Gymnastique Artistique</a>
                                <a class="dropdown-item" href="#">Gym'Adultes</a>
                                <a class="dropdown-item" href="#">Pilates</a>
                                <a class="dropdown-item" href="#">Zumba</a>
                                <a class="dropdown-item" href="{{ route('adherent.create') }}">Inscription</a>
                                <a class="dropdown-item" href="{{ route('login') }}">Connexion</a>

                                @endguest

                                @auth
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="http://localhost/GAC2/public/">Accueil</a>
                                        <a class="dropdown-item" href="http://localhost/GAC2/public/home/">Accueil administration</a>
                                        <a class="dropdown-item" href="#">BabyGym</a>
                                        <a class="dropdown-item" href="#">Gymnastique Artistique</a>
                                        <a class="dropdown-item" href="#">Gym'Adultes</a>
                                        <a class="dropdown-item" href="#">Pilates</a>
                                        <a class="dropdown-item" href="#">Zumba</a>
                                        <a class="dropdown-item" href="{{ route('adherent.create') }}">Inscription</a>
                                        <a class="dropdown-item" href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                    </div>
                                        @endauth
                                    </div>
                            </div>

    </nav>

    <main class="py-4">
        <script src="../../../resources/js/app.js"></script>
        @yield('content')
    </main>
</div>
</body>
</html>
