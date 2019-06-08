@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card liste">
          <div class="card-header section7">
            Liste des gymnastes s'entrainant le {{$creneau->jour->jour}} à {{$creneau->heure_debut}} h  {{$creneau->min_debut}} pendant {{$creneau->duree}} au {{App\Lieu::find($creneau->lieu_id)->nom}}</span>
            <ul class="nav nav-tabs nav-justified fiche ">
              <li class="active bandeRose"><a data-toggle="tab" href="#" class="identitetoggle"><i
                    class="fas fa-id-card rose"></i><br/>Identités</a></li>
              <li class="bandeBleu"><a data-toggle="tab" href="#" class="entrainementtoggle"><i
                    class="fas fa-dumbbell Bleu"></i><br/>Entrainements</a></li>
              <li class="bandeRouge"><a data-toggle="tab" href="#" class="urgencetoggle"><i
                    class="fas fa-briefcase-medical Rouge"></i><br/> En cas d'urgence</a></li>
            </ul>
          </div>
          <div class="card-body section7">
            <div class="tab-content">
              <table class="table">
                <thead>
                <tr>
                  <th class="toujours">Nom</th>
                  <th class="toujours">Prénom</th>
                  <th class="identite">Date de naissance</th>
                  <th class="identite">Sexe</th>
                  <th class="identite">Adresse</th>
                  <th class="identite">Email(s)</th>
                  <th class="identite">Téléphone(s)</th>
                  <th class="entrainement">Section</th>
                  <th class="entrainement">Groupe</th>
                  <th class="entrainement">Autori <br/>transp</th>
                  <th class="entrainement">Autori<br/> media</th>
                  <th class="entrainement">Autori sortie</th>
                  <th class="urgence">Autorisation 1er soins</th>
                  <th class="urgence">Personne à prévenir</th>
                  <th class="urgence">Téléphone</th>
                  <th class="urgence">Remarques</th>
                </tr>
                </thead>
                <tbody>
                @foreach($adherents as $adherent)
                  <tr>
                    <td class="small  toujours">{!! $adherent->nom !!}</td>
                    <td class="small  toujours">{!! $adherent->prenom !!}</td>
                    <td class="small identite"> {{strftime("%d/%m/%G", strtotime( $adherent->dateNaissance))}}</td>
                    <td class="small  identite">{{$adherent->sexe}}</td>
                    <td class="small  identite">{{$adherent->adresse}} - {{$adherent->cp}} {{$adherent->ville}}</td>
                    <td class="small identite">{!! $adherent->email1 !!}
                      @if($adherent->email2!='null')
                        {!! $adherent->email2 !!}
                      @endif</td>
                    <td class="small  identite">
                      @foreach($adherent->telephones as $telephone)
                        @if($telephone->typeTel_id==1)
                          <span>Tél adhérent:{{$telephone->numero}}</span><br/>
                        @elseif($telephone->typeTel_id==2)
                          <span>Tél1:{{$telephone->numero}}</span><br/>
                        @elseif($telephone->typeTel_id==3)
                          <span>Tél 2:{{$telephone->numero}}</span>
                        @endif
                      @endforeach</td>
                    <td class="entrainement"> {{$adherent->section->nom}}</td>
                    <td class="entrainement">
                      @isset($adherent->groupe){{$adherent->groupe->nom}}@endisset</td>
                    <td class="entrainement">
                      @if($adherent->autorisations->where('typeAuto_id','=','2')->first()->ok==1)
                        <i class="fas fa-car VertY"></i>
                      @elseif($adherent->autorisations->where('typeAuto_id','=','2')->first()->ok==0)
                        <i class="fas fa-car RougeN"></i>
                      @endif </td>
                    <td class="entrainement">
                      @if($adherent->autorisations->where('typeAuto_id','=','3')->first()->ok==1)
                        <i class="fas fa-camera VertY"></i>
                      @elseif ($adherent->autorisations->where('typeAuto_id','=','3')->first()->ok==0)
                        <i class="fas fa-camera RougeN"></i>
                      @endif</td>
                    <td class="entrainement">
                      @if($adherent->autorisations->where('typeAuto_id','=','4')->first()->ok==1)
                        <i class="fas fa-user-clock VertY"></i>
                      @elseif($adherent->autorisations->where('typeAuto_id','=','4')->first()->ok==0)
                        <i class="fas fa-user-clock RougeN"></i>
                      @endif </td>
                    <td class="small urgence">
                      @if($adherent->autorisations->where('typeAuto_id','=','1')->first()->ok==1)

                        <i class="fas fa-first-aid VertY"></i>
                      @elseif($adherent->autorisations->where('typeAuto_id','=','1')->first()->ok==0)
                        <i class="fas fa-first-aid RougeN"></i>
                      @endif
                    </td>
                    <td class="small urgence">
                      {{$adherent->nomUrgence}}
                    </td>
                    <td class="small urgence">
                      @if($adherent->telephones->where('typeTel_id','=','4')->first()!=null)
                        {{$adherent->telephones->where('typeTel_id','=','4')->first()->numero}}
                      @endif
                    </td>
                    <td class="small urgence">
                      @if($adherent->remarques->where('typeRq_id','=','2')->first()!=null)
                        {{$adherent->remarques->where('typeRq_id','=','2')->first()->remarque}}
                      @endif
                    </td>
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
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function () {
      $('.urgence').hide();
      $('.entrainement').hide();
      $('.dossier').hide();
      $('.payement').hide();
      $('.autres').hide();

      $('a.identitetoggle').click(function () {
        $('.identite').toggle(400);
        $('.urgence').hide();
        $('.entrainement').hide();
        $('.dossier').hide();
        $('.payement').hide();
        $('.autres').hide();
        return false;
      });
      $('a.entrainementtoggle').click(function () {
        $('.entrainement').toggle(400);
        $('.identite').hide();
        $('.urgence').hide();
        $('.dossier').hide();
        $('.payement').hide();
        $('.autres').hide();
        return false;
      });

      $('a.urgencetoggle').click(function () {
        $('.identite').hide();
        $('.urgence').toggle(400);
        $('.entrainement').hide();
        $('.dossier').hide();
        $('.payement').hide();
        $('.autres').hide();
        return false;
      });
      $('a.dossiertoggle').click(function () {
        $('.dossier').toggle(400);
        $('.urgence').hide();
        $('.entrainement').hide();
        $('.payement').hide();
        $('.autres').hide();
        $('.identite').hide();
        return false;
      });
      $('a.payementtoggle').click(function () {
        $('.payement').toggle(400);
        $('.dossier').hide();
        $('.urgence').hide();
        $('.entrainement').hide();
        $('.autres').hide();
        $('.identite').hide();
        return false;
      });
      $('a.autrestoggle').click(function () {
        $('.autres').toggle(400);
        $('.payement').hide();
        $('.dossier').hide();
        $('.urgence').hide();
        $('.entrainement').hide();
        $('.identite').hide();
        return false;
      });
    });
  </script>
@endsection
