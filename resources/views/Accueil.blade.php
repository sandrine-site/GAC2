@extends('layouts.app')
@section('content')

  <div class="Accueil">
    <div class="row row-Accueil">
      <div class="row row-Accueil1">
        <div class="offset-5 col-6">
          <div class="card cardAccueil1">
            <div class="card-header cardAccueil1">
              Forum des associations
            </div>
            <div class="card-body cardAccueil1">
            <h4> Le 7 septembre à partir de 14h</h4>
              Comme chaque année, au sortir de l’été, le Forum des associations marque la renaissance du monde associatif clapiérois, dans le cadre magnifique du parc Claude Leenhardt.
              Nous y seront présent venez nous y rejoindre.
            </div>
          </div>
        </div>
      </div>
      <div class="row row-Accueil2">
        <div class="offset-1 col-6">
          <div class="card cardAccueil2">
            <div class="card-header cardAccueil2">
              Saison 2018 -2019 Calendrier des Compétitions
            </div>
            <div class="card-body cardAccueil2">
   Voici les dates à réserver dans votre agenda....

   Compétitions Gymnastique UFOLEP 2019 :
   Championnats départementaux à Lavérune (34) les 26 et 27 janvier 2019
   Championnats régionaux pour les finalités jeunes à Lavérune (34) les 06 et 07 avril 2019
   Finales « Jeune » à Villeneuve sur Lot (47) les 25 et 26 mai 2019

   Pour toutes les féminines nées en 2007 et avant en plus de la compétition des 26 et 27 janvier vous avez les rencontres suivantes :

   Régionaux à Perpignan (66) les 13 et 14 avril 2019,gymnase du moulin à vent, boulevard Foment de la Sardanne.
   Demi-finale à Marvejols (48) les 11 et 12 mai 2019
   France « Finale Nationale » à Crolles (38) les 08 et 09 juin 2019
            </div>
          </div>
        </div>
      </div>
      <div class="row row-Accueil3">
  <a href="{{route('contactForm')}}"> <button class="btn-outline-accueil" >Nous contacter</button></a>
       </div>
    </div>
         </div>

@endsection
