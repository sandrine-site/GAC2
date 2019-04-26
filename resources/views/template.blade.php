<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GAC Clapiers</title>
      {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
    {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css') !!}
      <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >

</head>

<body>

<header>
    <nav class="navbar navbar-expand-md-12 navbar-light bg-light">
        <a class="navbar-brand" href="#"><img src="http://localhost/GAC3/resources/images/logo.png"></a>
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
           >Menu</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Accueil</a>
            <a class="dropdown-item" href="#">BabyGym</a>
            <a class="dropdown-item" href="#">Gymnastique Artistique</a>
            <a class="dropdown-item" href="#">Gym'Adultes</a>
            <a class="dropdown-item" href="#">Pilates</a>
            <a class="dropdown-item" href="#">Pilates</a>
            <a class="dropdown-item" href="#">Zumba</a>
            <a class="dropdown-item" href="#">Inscription</a>
            <a class="dropdown-item" href="#"><span class="glyphicon glyphicon-log-in"></span> Se connecter</a>
        </div>
    </nav>
</header>

        @yield('contenu')
</body>

</html>
