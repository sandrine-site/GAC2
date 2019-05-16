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
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
{{--    <link href="{{asset('css/app.css')}}" rel="stylesheet">--}}
    <link href="{{asset('css/app2.css')}}" rel="stylesheet">
    <!---JS----->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

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
                    <a class="dropdown-item" href="{{ route('adherent.create') }}">Inscription</a>
                    <a class="dropdown-item" href="{{ route('login') }}">Connexion</a>
                </div>
                    @endguest

                    @auth
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{!!route('accueil')!!}">Accueil</a>
                            <a class="dropdown-item" href="{!!route('home')!!}">Accueil
                                administration</a>
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
    <ul class="nav nav-tabs nav-justified menu ">
        <li class="active menu fondRose"><a data-toggle="tab" href="#identite">Accueil</a></li>
        <li class="bandeBleu menu"><a data-toggle="tab" href="#entrainement">Baby Gym</a></li>
        <li class="bandeViolette menu"><a data-toggle="tab" href="#urgence">Gymnastique Artistique</a></li>
        <li class="bandeHotpink menu"><a data-toggle="tab" href="#inscription">Gym'Adulte</a></li>
        <li class="bandeCyan menu"><a data-toggle="tab" href="#payement">Pilate</a></li>
        <li class="bandeJaune menu"><a data-toggle="tab" href="#autres">Zumba</a></li>
        <li class="bandeRouge menu"><a  href="{{ route('adherent.create') }}">Inscription</a></li>
    </ul>
</nav>

<main class="py-4">

    @yield('content')
</main>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script>
      window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
    @yield('script')
</body>
</html>
