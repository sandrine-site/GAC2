@extends('layouts.app')
@section('content')
  <br/>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header section1">Liste des Creneaux</div>
          <div class="card-body section1">
            <table class="table">
              <thead>
              <tr>

                <th>Jour</th>
                <th>Heure début</th>
                <th>Durée</th>
                <th>Lieu</th>
                <th>Entraineur</th>
                <th></th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($creneaux as $creneau)
                <tr>

                  <td class="text-primary">{!!$creneau->jour->jour!!}</td>
                  <td class="text-primary">{!! $creneau->heure_debut !!}
                    h{!! $creneau->min_debut !!}</td>
                  <td class="text-primary">{!! ($creneau->duree)!!}</td>
                  @if(App\Lieu::find($creneau->lieu_id)!=null)

                    <td class="text-primary"> {{App\Lieu::find($creneau->lieu_id)->nom}}</td>
                  @else
                    <td></td>
                  @endif
                  @if (count ($creneau->users))
                    <td class="text-primary">
                      @foreach($creneau->users as $user)
                        {{($user->prenom)}}
                      @endforeach
                    </td>
                  @else
                    <td></td>
                  @endif
                  <td>{!! link_to_route('creneau.edit', 'Modifier', [$creneau->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                  <td>    {!! Form::open(['method' => 'DELETE', 'route' => ['creneau.destroy', $creneau->id]]) !!}
                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce creneau ?\')']) !!}
                    {!! Form::close() !!}
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>


      {!! link_to_route('creneau.create', 'Ajouter un creneau', [], ['class' => 'btn btn-primary']) !!}
    </div>
  </div></div></div>
  <br/>
  <div class="row back">

                   <a href="javascript:history.back()" class="btn-back ">
                     <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                   </a>

             </div>
  </div>
@endsection
