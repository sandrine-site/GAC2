@extends('layouts.app')
@section('content')

  <div class="row justify-content-center recaptifulatif" id="app">
      <div class="card">
      <div class="card-header">
      Table des adhérents
      </div>
        <div class="card-body">
<table>
<thead>
<tr>
  <th>
    Nom Prénom
  </th>
  <th>Né </th>
  <th>Adresse</th>
  <th>téléphones</th>
  <th>A prevenir</th>
  <th>Section</th>
  <th>Groupe</th>
</tr>
</thead>
<tbody>
@foreach($adherents as $adherent)
 <tr >
 <td>{{$adherent->nom}} {{$adherent->prenom}} </td>
 <td>{{strftime("%d/%m/%G", strtotime($adherent->dateNaissance))}} à  {{$adherent->lieuNaissance}} </td>
   <td>{{$adherent->adresse}} - {{$adherent->cp}} {{$adherent->ville}}</td>

<td>@foreach($adherent->telephones as $telephone)
{{$telephone->typeTel->type}} :<br/>
  {{$telephone->numero}}<br/>
   @endforeach</td>
   <td>{{$adherent->nomUrgence}}</td>
   <td>@foreach($adherent->remarques as $remarque)
   {{$remarque->typeRq->type}}:<br/>
     {{$remarque->remarque}}<br/>
      @endforeach</td>
   <td>{{$adherent->section->nom}}</td>
   <td>@isset($adherent->groupe) {{$adherent->groupe->nom}}
   @endisset</td>
 </tr>

@endforeach
</tbody>
</table>
        </div>
      </div>

  </div>
        <div class="row back">
                  <a href="javascript:history.back()" class="btn-back ">
                    <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                  </a>
          {!! $adherents->links()  !!}
                  <a href="{{route('home')}}"
                                     class="btn-home "
                                     >Accueil administration
                    <i class="fas fa-home"></i>
                  </a>
                </div>

@endsection
