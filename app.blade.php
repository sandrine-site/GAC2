<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GAC Clapiers</title>
  <meta name="description" content="G.A.C. propose des scéances de babyGym, des cours de gymnastique féminine pour le loisir et la competition pour les enfants ainsi que des cours de Gym, zumba et Pilztes pour les adultes
  à Clapiers dans l'herault,34, Occitanie">
 <link rel="shortcut icon" type="image/ico" href="{{asset('public/images/ico.png')}}">
  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('G.A.C.Clapiers', 'http://gac.slashcreations.fr') }}</title>

  <!-- Scripts -->


{{--   <script src="{{ asset('resources/js/app.js') }}"></script>--}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
{{--      <script src="https://unpkg.com/axios/dist/axios.min.js"></script>--}}

  <!--tinyMCE-->
  <script src="https://cdn.tiny.cloud/1/ml0pyee54mk9ckslddh5xe90xundxmo02hggj1v9bnnbyi8a/tinymce/5/tinymce.min.js"></script>

  <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="{{ asset('public/js/app.js') }}"> </script>
  <link href="{{asset('public/css/app2.css')}}" rel="stylesheet">


</head>

<body>
<nav class="navbar navbar-expand-md navbar-expand-sm  navbar-light navbar-laravel navbar-fixed-top">
    <div class="container col-sm-12">
        <a class="navbar-brand" href="#">
        <div id="contenaireClapiers">
        <img src="{{ asset('/public/images/logo_clapiers_header.png')}}" alt="logo de la ville de Clapiers">
        <p>Ville de Clapiers, Hérault ,34</p>
        </div>
          <div id="contenaireGAC">
            <img src="{{ asset('/public/images/logoBlanc.png')}}" alt="logo de GAC Clapiers">
            <h1>Gymnastique Artistique Clapiéroise</h1>
          </div>
          <div id="contenaireUFPLEP">
          <img src="{{asset('/public/images/logoufoleptransparent.png')}}" alt="logo de l'UFOLEP">
          </div>
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @guest

            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('adherent.create') }}">Inscription GA</a>
                  <a class="dropdown-item" href="{{route('contactForm')}}">Nous contacter</a>
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
        <li class=" menu fondRose"><a href="{{ route('accueil') }}" class="navRose">Accueil</a></li>
        <li class="bandeBleu menu"><a href="{{ route('baby') }}" class="navBleu">Baby Gym</a></li>
        <li class="bandeViolette menu"><a href="{{ route('GA') }}" class="navViolette">Gymnastique Artistique</a></li>
        <li class="bandeHotpink menu"><a href="{{ route('adulte') }}" class="navHotpink">Gym'Adulte</a></li>
        <li class="bandeCyan menu"><a href="{{ route('pilates') }}" class="navCyan">Pilates</a></li>
        <li class="bandeJaune menu"><a href="{{ route('zumba') }}" class="navJaune">Zumba</a></li>
        <li class="bandeRouge menu"><a  href="{{ route('adherent.create') }}" class="navRouge">Inscription</a></li>
    </ul>
</nav>

<main class="py-4">
    @yield('content')
</main>

<footer>
<div id="liens">
  <a href="{{route('rgpd')}}">Mentions légales</a><br/>
<a href="http://www.ville-clapiers.fr/" >Ville de CLAPIERS</a><br/>
<a href="https://www.ufolep.org/">UFOLEP</a>
  </div>
  <div id="titreFooter">G.A.C. - Gymnastique Artistique Clapiéroise -</div>
  <div id="contenaireGAC2">
             <img src="{{ asset('/public/images/logoGAC2.png')}}">
           </div>
</footer>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>



@yield('script')
</body>
</html>
