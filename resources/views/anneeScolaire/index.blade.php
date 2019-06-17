@extends('layouts.app')
@section('content')

  <div class="row justify-content-center">
    <div class="col-6">
      <div class="card">
      <div class="card-header">
        Changer l'année scolaire
      </div>
        <div class="card-body">
          Avant de changer l'année scolaire pensez, si nécessaire, à imprimer la tables des adhérents<br/><br/>
          <div class="row justify-content-center">
            <div>
              <a href="{!!route('anneeScolaire.create')!!}" class=" btn btn-success" ><span class="far fa-save"> </span> Visualiser  </a></div>
          </div><br/>
          Le changement d'année entrainera l'effacement des tables suivantes:
          <ul>
            <li> La table des adhérents</li>
            <li> La table des groupes</li>
            <li> La table des sections</li>
            <li> La table des creneaux horaire</li>
            <li> La table des payements</li>
          </ul>
          <div class="row justify-content-center">
          {!! Form::open(['method' => 'DELETE', 'route' => 'anneeScolaire.destroy']) !!}
                             {!! Form::submit('Changer l\'année', ['class' => 'btn btn-danger', 'onclick' => 'return confirm(\'Voulez-vous vraiment effacer les tables ?\')']) !!}
                             {!! Form::close() !!}
          </div>
        </div>
      </div>
        </div>
      </div>
      <div class="row back">
           <a href="javascript:history.back()" class="btn-back ">
             <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
           </a>
           <a href="{{route('home')}}"
                              class="btn-home "
                              >Accueil administration
             <i class="fas fa-home"></i>
           </a>
         </div>

@endsection
