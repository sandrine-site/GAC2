@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card liste">
          <div class="card-header display-6 section2 ">Liste des adherents</div>
          <div>
            <ul class="nav nav-tabs nav-justified admin">
              <li class="active bandeRose"><a data-toggle="tab" href="#" class="identitetoggle"><i
                    class="fas fa-id-card rose"></i><br/>Identités</a></li>
              <li class="bandeBleu"><a data-toggle="tab" href="#" class="entrainementtoggle"><i
                    class="fas fa-dumbbell Bleu"></i><br/>Entrainements</a></li>
              <li class="bandeRouge"><a data-toggle="tab" href="#" class="urgencetoggle"><i
                    class="fas fa-briefcase-medical Rouge"></i><br/> En cas d'urgence</a></li>
              <li class="bandeHotpink"><a data-toggle="tab" href="#" class="dossiertoggle"><i
                    class="fas fa-copy Hotpink"></i><br/> Dossiers d'inscription</a></li>
              <li class="bandeCyan"><a data-toggle="tab" href="#" class="payementtoggle"><i
                    class="fas fa-money-bill-wave Cyan"></i><br/> Payements</a></li>
              <li class="bandeJaune"><a data-toggle="tab" href="#" class="autrestoggle"><i
                    class="fas fa-highlighter Jaune"></i><br/> Autres remarques</a></li>
            </ul>
          </div>
          <div class="card-body section2">
            <div class="tab-content ">
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
                  <th class="entrainement">Creneaux</th>
                  <th class="entrainement">Autori <br/>transp</th>
                  <th class="entrainement">Autori<br/> media</th>
                  <th class="entrainement">Autori sortie</th>
                  <th class="urgence">Autorisation 1er soins</th>
                  <th class="urgence">Personne à prévenir</th>
                  <th class="urgence">Téléphone</th>
                  <th class="urgence">Remarques</th>
                  <th class="dossier">Certificat<br/> médical</th>
                  <th class="dossier">Photo</th>
                  <th class="dossier">Autorisations<br/>papiers</th>
                  <th class="dossier">Attestation<br/> demandée</th>
                  <th class="dossier">Dossier Complet</th>
                  <th class="payement"></th>
                  <th class="payement"></th>
                  <th class="payement">Remarques</th>
                  <th class="autres">Remarques</th>
                  <th class="toujours"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($adherents as $adherent)
                  <tr>
                    <td class="section{{$adherent->section->id}} toujours">{!! $adherent->nom !!}</td>
                    <td class="section{{$adherent->section->id}} toujours">{!! $adherent->prenom !!}</td>
                    <td class="section{{$adherent->section->id}} identite"> {{strftime("%d/%m/%G", strtotime( $adherent->dateNaissance))}}</td>
                    <td class="section{{$adherent->section->id}} identite">{{$adherent->sexe}}</td>
                    <td class="section{{$adherent->section->id}} identite">{{$adherent->adresse}} - {{$adherent->cp}} {{$adherent->ville}}</td>
                    <td class="section{{$adherent->section->id}} identite">{!! $adherent->email1 !!}
                      @if($adherent->email2!='null')
                        {!! $adherent->email2 !!}
                      @endif</td>
                    <td class="section{{$adherent->section->id}} identite">@foreach($adherent->telephones as $telephone)
                        @if($telephone->typeTel_id==1)
                          <span>Tél adhérent:{{$telephone->numero}}</span><br/>
                        @elseif($telephone->typeTel_id==2)
                          <span>Tél1:{{$telephone->numero}}</span><br/>
                        @elseif($telephone->typeTel_id==3)
                          <span>Tél 2:{{$telephone->numero}}</span>
                        @endif
                      @endforeach</td>
                    <td class="section{{$adherent->section->id}} entrainement"> {{$adherent->section->nom}}</td>
                    <td class="section{{$adherent->section->id}} entrainement">
                      @isset($adherent->groupe){{$adherent->groupe->nom}}
                      @endisset</td>
                    <td class="section{{$adherent->section->id}} entrainement">
                      @isset($adherent->creneaux)
                        @foreach ($adherent->creneaux as $creneau)
                          le {{$creneau->jour->jour}} à {{$creneau->heure_debut}}h{{$creneau->min_debut}}
                        @endforeach
                      @endisset</td>
                    <td class="entrainement"> @if($adherent->autorisations->where('typeAuto_id','=','2')->first()->ok==1)
                        <i class="fas fa-car VertY"></i>
                      @elseif($adherent->autorisations->where('typeAuto_id','=','2')->first()->ok==0)
                        <i class="fas fa-car RougeN"></i>
                      @endif </td>
                    <td class="entrainement">@if($adherent->autorisations->where('typeAuto_id','=','3')->first()->ok==1)
                        <i class="fas fa-camera VertY"></i>
                      @elseif ($adherent->autorisations->where('typeAuto_id','=','3')->first()->ok==0)
                        <i class="fas fa-camera RougeN"></i>
                      @endif</td>
                    <td class="entrainement">@if($adherent->autorisations->where('typeAuto_id','=','4')->first()->ok==1)
                        <i class="fas fa-user-clock VertY"></i>
                      @elseif($adherent->autorisations->where('typeAuto_id','=','4')->first()->ok==0)
                        <i class="fas fa-user-clock RougeN"></i>
                      @endif </td>
                    <td class="section{{$adherent->section->id}} urgence">
                      @if($adherent->autorisations->where('typeAuto_id','=','1')->first()->ok==1)

                        <i class="fas fa-first-aid VertY"></i>
                      @elseif($adherent->autorisations->where('typeAuto_id','=','1')->first()->ok==0)
                        <i class="fas fa-first-aid RougeN"></i>
                      @endif
                    </td>
                    <td class="section{{$adherent->section->id}} urgence">
                      {{$adherent->nomUrgence}}
                    </td>
                    <td class="section{{$adherent->section->id}} urgence">
                      @if($adherent->telephones->where('typeTel_id','=','4')->first()!=null)
                        {{$adherent->telephones->where('typeTel_id','=','4')->first()->numero}}
                      @endif
                    </td>
                    <td class="section{{$adherent->section->id}} urgence">
                      @if($adherent->remarques->where('typeRq_id','=','2')->first()!=null)
                        {{$adherent->remarques->where('typeRq_id','=','2')->first()->remarque}}
                      @endif
                    </td>
                    <td class="dossier" >
                      @if($adherent->CertifMedical==1)
                        <i class="fas fa-check-circle VertY"></i>
                      @endif</td>
                    <td class="dossier">
                      @if($adherent->photo==1)
                        <i class="fas fa-check-circle  VertY"></i>
                    @endif
                    <td class="dossier">
                      @if($adherent->autorisationsRendues==1)
                        <i class="fas fa-check-circle VertY">
                      @endif</td>
                    <td class="dossier">
                      @if($adherent->RecuDemande==1)
                        <i class="fas fa-flag Jaunejaune"></i>
                      @endif</td>
                    <td class="dossier">
                      @if($adherent->autorisationsRendues==1&&$adherent->photo==1&&$adherent->CertifMedical==1)
                        <i class="fas fa-smile VertY"></i>
                      @else
                        <i class="fas fa-frown  RougeN"></i>
                      @endif</td>
                    <td class="section{{$adherent->section->id}} payement"> </td>
                    <td class="section{{$adherent->section->id}} payement"></td>
                    <td class="section{{$adherent->section->id}} payement">
                      @if($adherent->remarques->where('typeRq_id','=','3')->first()!=null)
                        {{$adherent->remarques->where('typeRq_id','=','3')->first()->remarque}}
                      @endif</td>
                    <td class="section{{$adherent->section->id}} autres" >
                      @if($adherent->remarques->where('typeRq_id','=','4')->first()!=null)
                        {{$adherent->remarques->where('typeRq_id','=','4')->first()->remarque}}
                      @endif</td>
                    <td class="toujours">
                      <form action='./adherent/edit' method="post">
                        {{method_field ("get")}}
                        <input type="hidden" name="id" value="{{$adherent->id}}">

                        <button type="submit" class="btn btn-primary btn xx-small">Editer <i
                            class="fas fa-edit"></i></button>
                      </form>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row back">
      <a href="javascript:history.back()" class="btn-back">
        <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
      </a>
      {!! $adherents->links()  !!}
    </div>
  </div>

@endsection
@section('script')
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
