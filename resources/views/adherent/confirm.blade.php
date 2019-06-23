@extends('layouts.app')
@section('content')

  <div class="Confirm">
    <div class="row row-Confirm">
<div class="offset-md-3  col-md-6 col-sm-12">
 <div class="card cardConfirm">
<div class="card-header cardConfirm">
Confirmation

</div>
<div class="card-body cardConfirm">
  Votre inscription à bien été prise en compte
    Vous recevrez une confirmation de votre inscription, ainsi que les documents à imprimer sur votre boite email .
    Veuillez remettre à votre entraîneur
    <ul>
      <li>Les documents joints au mail, signés,</li>
      <li>Une photo pour les adhérent "compétition",</li>
      <li>Un certificat médical  ou l'attestation de santé (pour les anciens)</li>
      <li> Le payement</li>
      <li>Une enveloppe timbrée</li>
      <a type="button" class="btn-outline-primary" href="{{route('tarif.calcul')}}" >Calcul du tarif</a></ul>

      Si vous ne recevez pas d'email dans les 30 min, veuillez nous écrire à l'adresse : gacgym@hotmail.fr
   </div>
        </div>


    </div>
      </div>

@endsection
