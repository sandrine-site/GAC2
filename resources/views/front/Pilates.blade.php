@extends('layouts.app')
@section('content')

  <div class="pilates">
    <div class="row row-pilates">
<div class="offset-4 col-6">
 <div class="card cardPilates">
<div class="card-header cardPilates">
PILATES
</div>
<div class="card-body cardPilates">
  Le Pilates est une méthode de stimulation physique basée sur la respiration, la concentration, la fluidité des gestes, la précision des postures, l'isolation des contractions musculaires, la maîtrise de ses mouvements  et des enchaînements.

  Le Pilates participe à améliorer le raffermissement musculaire, le gainage, à lutter contre le stress à placer le dos et renforcer les abdominaux.

  Les exercices ne sont  jamais douloureux  ou traumatisant.
      </div>
        </div>

  <div class="card cardPilates">
 <div class="card-header cardPilates">
 PILATES à CLAPIERS
 </div>
 <div class="card-body cardPilates">
   Tous les jeudis au gymnase Abati de 19h00 à 20h00
<br/>
   <a href="{{asset('public/images/Gym_adulte_V1_2018-2019.pdf')}}"><button class="btn-outline-pilates" >Renseignements-Inscription</button></a>
       </div>
    <div class="row justify-content-center">
              <a href="{{route('contactForm')}}"> <button class="btn-outline-pilates" >Nous contacter</button></a>
                   </div>
         </div>
      </div>
    </div>
      </div>
    </div>
  </div>
@endsection
