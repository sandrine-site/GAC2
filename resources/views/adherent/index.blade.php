@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span
                            class="card-header display-6">Liste des adherents</span>
                        <ul class="nav nav-tabs nav-justified fiche ">
                            <li class="active bandeRose"><a data-toggle="tab" href="#identite"><i
                                        class="fas fa-id-card rose"></i><br/>Identités</a></li>
                            <li class="bandeBleu"><a data-toggle="tab" href="#entrainement"><i
                                        class="fas fa-dumbbell Bleu"></i><br/>Entrainements</a></li>
                            <li class="bandeRouge"><a data-toggle="tab" href="#urgence"><i
                                        class="fas fa-briefcase-medical Rouge"></i><br/> En cas d'urgence</a></li>
                            <li class="bandeHotpink"><a data-toggle="tab" href="#inscription"><i
                                        class="fas fa-copy Hotpink"></i><br/> Dossiers d'inscription</a></li>
                            <li class="bandeCyan"><a data-toggle="tab" href="#payement"><i
                                        class="fas fa-money-bill-wave Cyan"></i><br/> Payements</a></li>
                            <li class="bandeJaune"><a data-toggle="tab" href="#autres"><i
                                        class="fas fa-highlighter Jaune"></i><br/> Autres remarques</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div id="identite" class="tab-pane fade-in active">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Date de naissance</th>
                                        <th>Sexe</th>
                                        <th>Adresse</th>
                                        <th>Email(s)</th>
                                        <th>Téléphone(s)</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($adherents as $adherent)
                                        <tr>
                                            <td class="section{{$adherent->section->id}}">{!! $adherent->nom !!}</td>
                                            <td class="section{{$adherent->section->id}}">{!! $adherent->prenom !!}</td>
                                            <td class="section{{$adherent->section->id}}"> {{strftime("%d/%m/%G", strtotime( $adherent->dateNaissance))}}</td>
                                            <td class="section{{$adherent->section->id}}">{{$adherent->sexe}}</td>
                                            <td class="section{{$adherent->section->id}}">{{$adherent->adresse}} - {{$adherent->cp}} {{$adherent->ville}}</td>

                                            <td class="section{{$adherent->section->id}}">{!! $adherent->email1 !!}
                                                @if($adherent->email2!='null')
                                                    {!! $adherent->email2 !!}
                                                @endif</td>
                                            <td class="section{{$adherent->section->id}}">@foreach($adherent->telephones as $telephone)
                                                    @if($telephone->typeTel_id==1)
                                                        <span>Tél adhérent:{{$telephone->numero}}</span><br/>
                                                    @elseif($telephone->typeTel_id==2)
                                                        <span>Tél1:{{$telephone->numero}}</span><br/>
                                                    @elseif($telephone->typeTel_id==3)
                                                        <span>Tél 2:{{$telephone->numero}}</span>
                                                    @endif
                                                @endforeach</td>

                                            <td>
                                                <form action='./adherent/edit' method="post">
                                                    {{method_field ("get")}}
                                                    <input type="hidden" value="{{$adherent->id}}" name="id">
                                                    <button type="submit" class="btn btn-primary btn xx-small">Editer <i
                                                            class="fas fa-edit"></i></button></form></td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div id="entrainement" class="tab-pane fade-in">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Section</th>
                                        <th>Groupe</th>
                                        <th>Creneaux</th>
                                        <th>Autorisations</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($adherents as $adherent)
                                        <tr>
                                            <td class="section{{$adherent->section->id}}">{!! $adherent->nom !!}</td>
                                            <td class="section{{$adherent->section->id}}">{!! $adherent->prenom !!}</td>
                                            <td class="section{{$adherent->section->id}}"> {{$adherent->section->nom}}</td>
                                            <td class="section{{$adherent->section->id}}"> @isset($adherent->groupe){{$adherent->groupe->nom}}@endisset</td>
                                            <td >creneaux</td>
                                            @foreach($adherent->autorisations as $autorisation)
                                                <td>
                                                    @if($autorisation->typeAuto_id==2)
                                                        @if($autorisation->ok==1)
                                                            <i class="fas fa-car Vert2"></i>
                                                        @else
                                                            <i class="fas fa-car Rouge"></i>
                                                        @endif
                                                </td>
                                                <td>
                                                    @elseif($autorisation->typeAuto_id==3)
                                                        @if($autorisation->ok==1)
                                                            <i class="fas fa-camera Vert2"></i>
                                                        @else
                                                            <i class="fas fa-camera Rouge"></i>
                                                        @endif
                                                </td>
                                                <td>
                                                    @elseif($autorisation->typeAuto_id==4)
                                                        @if($autorisation->ok==1)
                                                            <i class="fas fa-user-clock Vert2"></i>
                                                        @else
                                                            <i class="fas fa-user-clock Rouge"></i>
                                                        @endif
                                                    @endif
                                                </td>
                                            @endforeach

                                            <td>
                                                <form action='./adherent/edit' method="post">
                                                    {{method_field ("get")}}
                                                    <input type="hidden" value="{{$adherent->id}}" name="id">
                                                    <button type="submit" class="btn btn-primary btn xx-small">Editer <i
                                                            class="fas fa-edit"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div id="urgence" class="tab-pane fade-in">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Personne à prévenir</th>
                                        <th>Téléphone</th>
                                        <th>Remarques</th>
                                        <th>Autorisation 1er soins</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($adherents as $adherent)
                                        <tr>
                                            <td class="section{{$adherent->section->id}}">{!! $adherent->nom !!}</td>
                                            <td class="section{{$adherent->section->id}}">{!! $adherent->prenom !!}</td>
                                            <td class="section{{$adherent->section->id}}"> {{$adherent->nomUrgence}}</td>
                                            <td class="section{{$adherent->section->id}}">
                                                @foreach($adherent->telephones as $telephone)
                                                    @if($telephone->typeTel_id==4)
                                                        <span>{{$telephone->numero}}</span><br/>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="section{{$adherent->section->id}}">
                                                @foreach($adherent->remarques as $remarque)
                                                    @if (isset($remarque)&& $remarque->typeRq_id==2)
                                                        {{$remarque->remarque}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="section{{$adherent->section->id}}">
                                                @foreach($adherent->autorisations as $autorisation)
                                                    @if($autorisation->typeAuto_id==1)
                                                        @if($autorisation->ok==1)
                                                            <i class="fas fa-first-aid Vert2"></i>
                                                        @else
                                                            <i class="fas fa-first-aid Rouge"></i>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <form action='./adherent/edit' method="post">
                                                    {{method_field ("get")}}
                                                    <input type="hidden" value="{{$adherent->id}}" name="id">
                                                    <button type="submit" class="btn btn-primary btn xx-small">Editer <i
                                                            class="fas fa-edit"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div id="inscription" class="tab-pane fade-in">
                                <form action='./adherent/updateDocument' method="get">
                                    {!!csrf_field ()  !!}
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Certificat<br/> médical</th>
                                            <th>Photo</th>
                                            <th>Autorisations<br/>papiers</th>
                                            <th>Attestation<br/> demandée</th>
                                            <th>Dossier Complet</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($adherents as $adherent)
                                            <tr>
                                                <td class="section{{$adherent->section->id}}">
                                                    {{$adherent->nom}}
                                                </td>
                                                <td class="section{{$adherent->section->id}}">
                                                    {{$adherent->prenom}}
                                                </td>
                                                <td>
                                                    @if($adherent->CertifMedical==1)
                                                        <i class="fas fa-check-circle small Vert2"></i>
                                                    @else
                                                        <input type="checkbox" name="CertifMedical[]"value="{{$adherent->CertifMedical}}{{$adherent->id}}">
                                                    @endif</td>
                                                <td>
                                                    @if($adherent->photo==1)
                                                        <i class="fas fa-check-circle small  Vert2"></i>
                                                    @else
                                                        <input type="checkbox" name="photo[]"
                                                               value="{{$adherent->photo}}{{$adherent->id}}">
                                                    @endif</td>
                                                <td>
                                                    @if($adherent->autorisationsRendues==1)
                                                        <i class="fas fa-check-circle small Vert2">
                                                    @else
                                                        <input type="checkbox" name="autorisationsRendues[]"
                                                               value="{{$adherent->autorisationsRendues}}{{$adherent->id}}">
                                                    @endif</td>
                                                <td>
                                                    @if($adherent->RecuDemande==1)
                                                        <i class="fas fa-flag small Jaune"></i>
                                                    @else
                                                        <input type="checkbox" name="RecuDemande[]"
                                                               value="{{$adherent->RecuDemande}}{{$adherent->id}}">
                                                    @endif</td>
                                                <td>
                                                    @if($adherent->autorisationsRendues==1&&$adherent->photo==1&&$adherent->CertifMedical==1)
                                                        <i class="fas fa-smile Vert2"></i>
                                                        @else
                                                        <i class="fas fa-frown Rouge"></i>
                                                    @endif</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-primary btn pull-right">Enregistrer
                                        les modifications
                                    </button>
                                </form>
                            </div>

                            <div id="payement" class="tab-pane fade-in">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th></th>
                                        <th></th>
                                        <th>Remarques</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($adherents as $adherent)
                                        <tr>
                                            <td class="section{{$adherent->section->id}}">{!! $adherent->nom !!}</td>
                                            <td class="section{{$adherent->section->id}}">{!! $adherent->prenom !!}</td>
                                            <td class="section{{$adherent->section->id}}"> </td>
                                            <td class="section{{$adherent->section->id}}"></td>
                                            <td class="section{{$adherent->section->id}}">
                                                @foreach($adherent->remarques as $remarque)
                                                    @if (isset($remarque)&& $remarque->typeRq_id==3)
                                                        {{$remarque->remarque}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="section{{$adherent->section->id}}">

                                            </td>
                                            <td>
                                                <form action='./adherent/edit' method="post">
                                                    {{method_field ("get")}}
                                                    <input type="hidden" value="{{$adherent->id}}" name="id">
                                                    <button type="submit" class="btn btn-primary btn xx-small">Editer <i
                                                            class="fas fa-edit"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div id="autres" class="tab-pane fade-in">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Remarques</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($adherents as $adherent)
                                        <tr>
                                            <td class="section{{$adherent->section->id}}">{!! $adherent->nom !!}</td>
                                            <td class="section{{$adherent->section->id}}">{!! $adherent->prenom !!}</td>
                                            <td class="section{{$adherent->section->id}}">
                                                @foreach($adherent->remarques as $remarque)
                                                    @if (isset($remarque)&& $remarque->typeRq_id==4)
                                                        {{$remarque->remarque}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="section{{$adherent->section->id}}">

                                            </td>
                                            <td>
                                                <form action='./adherent/edit' method="post">
                                                    {{method_field ("get")}}
                                                    <input type="hidden" value="{{$adherent->id}}" name="id">
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
            <div class="display-2">
                <div class="row">
                </div>
    {!! $adherents->links()  !!}

@endsection
