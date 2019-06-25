@extends('layouts.app')
@section('content')

  <div class="GA">

    <div class="row row-GA">
<div class="offset-3 col-6">
 <div class="card cardGA">
<div class="card-header cardGA">
Gymnastique Artistique
</div>
<div class="card-body cardGA">
  Nous proposons des cours de gymnastique féminine dans une salle spécialisée en compétition ou pour une pratique loisir.

  La gymnastique se compose de quatre agrès, poutre, barres asymétriques, saut, sol.
      </div>
        </div>

  <div class="card cardGA">
 <div class="card-header cardGA">
GA à CLAPIERS
 </div>
 <div class="card-body cardGA">
   Lieu : Gymnase du collège François Mitterrand de Clapiers, 380 avenue  Georges Frêche.
   Horaires :de nombreux  creneaux dans la semaine
<br/>
   <a  href="{{ route('adherent.create')}}"><button class="btn-outline-GA" >Inscription</button></a>
       </div>
    <div class="row justify-content-center">
         <a href="{{route('contactForm')}}"> <button class="btn-outline-GA" >Nous contacter</button></a>
              </div>
         </div>
      </div>


    </div> </div>
      </div>
    </div>
  </div>
@endsection
