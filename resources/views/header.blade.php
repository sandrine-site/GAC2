@extends('template')

@section('header')


<header>

    <div class="menu">
        <input type="checkbox" name="menuburger" id="menuburger">
        <label for="menuburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </label>

        <nav>
            <a href="index.html">Accueil</a><br />
            <a href="#">BabyGym</a><br />
            <a href="#">Gymnastique Artistique</a>
            <a href="#">Gym'Adultes</a>
            <a href="#">Pilates</a>
            <a href="#">Zumba</a>
            <a href="contact.html">Inscription/Contact</a>
            <hr />
            <a href="#">Connexion</a>
        </nav>
    </div>

    <img src="../../public/images/gymnastique-artistique-clapiers-herault-34.png" />
</header>
@stop('header')

