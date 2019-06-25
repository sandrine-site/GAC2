@extends('layouts.app')
@section('content')

  <div class="baby">

    <div class="row row-baby">
<div class="offset-3 col-6">
 <div class="card cardBaby">
<div class="card-header cardBaby">
Baby-Gym
</div>
<div class="card-body cardBaby">
  Concerne les enfants filles et garçons scolarisés en maternelle.

  A partir de 3  ans la Baby- Gym est une activité ludique. Les enfants s'amusent tout en développant leurs motricité, équilibre, coordination sur des parcours gymniques.

  Se balancer, sauter, ramper, tourner, se renverser, courir et en deuxième partie de l'année, préparer le Gala du club pour présenter son travail et ses progrès aux parents.
      </div>
        </div>

  <div class="card cardBaby">
 <div class="card-header cardBaby">
Baby-Gym à CLAPIERS
 </div>
 <div class="card-body cardBaby">
   Lieu : Gymnase du collège François Mitterrand de Clapiers, 380 avenue  Georges Frêche.
   Horaires :

   Petite et moyenne sections : Mercredi  17h00 - 18h00

   Grande section : contactez nous
<br/>
   <a  href="{{ route('adherent.create')}}"><button class="btn-outline-baby" >Inscription</button></a>
       </div>
         </div>
  <div class="row justify-content-center">
    <a href="{{route('contactForm')}}"> <button class="btn-outline-baby" >Nous contacter</button></a>
         </div>
      </div>
    </div>
      </div>
    </div>
  </div>
@endsection
