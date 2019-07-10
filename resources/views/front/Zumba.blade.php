@extends('layouts.app')
@section('content')

  <div class="zumba">
    <div class="row row-zumba">
<div class="offset-4 col-6">
 <div class="card cardZumba">
<div class="card-header cardZumba">
ZUMBA
</div>
<div class="card-body cardZumba">
  Un programme physique, dynamique, complet où l'on s'amuse dans une ambiance conviviale !

  Venez rejoindre Sabrina  qui vous proposera un compromis idéal entre fitness et danse.
      </div>
        </div>

  <div class="card cardZumba">
 <div class="card-header cardZumba">
ZUMBA à CLAPIERS
 </div>
 <div class="card-body cardZumba">
   HORAIRES :

   Tous les samedi de l'année scolaire 2017-2018, 33 séances  de 10h45 à 11h45
   Lieu : Gymnase Joêl ABATI, rue du Paraguay, CLAPIERS

<br/>
   <a href="{{asset('public/images/Gym-zumba.pdf')}}"><button class="btn-outline-zumba" >Renseignements-Inscription</button></a>
       </div>
         </div>
  <div class="row justify-content-center">
       <a href="{{route('contactForm')}}"> <button class="btn-outline-zumba" >Nous contacter</button></a>
     </div>

      </div>
    </div>
      </div>
    </div>
  </div>
@endsection
