@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @foreach($adherent as $adherent)

                        <span
                            class="card-header display-6">Fiche de : {{" "}}   {{$adherent->prenom}} {{$adherent->nom}}  </span>

                        <div class="card-body">
                            <div class="row display-5">
                                <div class="col-7 ">
                                    <p>Adresse :{{$adherent->adresse}}
                                        - {{$adherent->cp}} {{$adherent->ville}}</p>
                                </div>
                                <div class=" col-5">
                                    <div class="col-12">
                                        <p>Date de
                                            naissance: {{strftime("%d/%m/%G", strtotime( $adherent->dateNaissance))}}</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            à {{$adherent->lieuNaissance}}
                                        </div>
                                        <div class="col-6">
                                            {{$adherent->sexe}}
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row display-5">
                                <div class="col-6">
                                    @foreach($telephones as $telephone)
                                        @if ($telephone->typeTel_id==1)
                                            <p>Téléphone adhérent:{{$telephone->numero}}</p>
                                        @elseif($telephone->typeTel_id==2)
                                            <p>Téléphone responsable légal 1 : {{$telephone->numero}}  </p>
                                        @elseif($telephone->typeTel_id==3)
                                            <p>Téléphone responsable légal 2 : {{$telephone->numero}}  </p>
                                        @endif
                                    @endforeach
                                </div>
                                <div class=" col-6">
                                    Email: {{$adherent->email1}}

                                    @if(isset($adherent->email2)&&$adherent->email2!='null')
                                        et  {{$adherent->email2}}
                                    @endif
                                </div>
                            </div>
                        </div>
                </div>
                <br/>
                <div class="row haut ">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">Entrainement:</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="fonce">Section : {{$adherent->section->nom}}</h4>
                                        <h4 class="fonce">Groupe : </h4>
                                        <p class="fonce">Creneaux :</p>
                                        @foreach ($licence as $licence)
                                            <p class="fonce">Licencié le : {{$licence->DateLicence}}</p>
                                            <p class="fonce">Numéro de licence : {{$licence->numLicence}}</p>
                                        @endforeach
                                    </div>
                                    <div class="col-12">
                                        @if ($adherent->minibus==1)
                                            <p class="flex-nowrap"><i class="fas fa-bus"></i><p class="xx-small"> Doit
                                                être
                                                transportée en minibus </p> </p>@endif
                                        <p>Autorisations :</p>
                                        @foreach($autorisations as $autorisation)
                                            @if ($autorisation->typeAuto_id===4)
                                                @if($autorisation->ok===1)
                                                    <div class="xx-small flex-nowrap"><i class="fas fa-child large"></i>
                                                        Est
                                                        autorisé(e) à partir seul(e) à la fin de l'entrainement
                                                    </div>
                                                @else
                                                    <div class="xx-small flex-nowrap "><i
                                                            class="fas fa-child large barre"></i> N'est pas autorisé(e)
                                                        à
                                                        partir seul(e) à la fin de l'entrainement
                                                    </div>
                                                @endif
                                            @elseif ($autorisation->typeAuto_id=='3')
                                                @if($autorisation->ok==1)
                                                    <div class="xx-small flex-nowrap"><i class="fas fa-video large"></i>
                                                        A
                                                        l'autorisation media
                                                    </div>
                                                @else
                                                    <div class="xx-small flex-nowrap"><i
                                                            class="fas fa-video large barre"></i> N'a pas l'autorisation
                                                        media
                                                    </div>
                                                @endif
                                            @elseif ($autorisation->typeAuto_id=='2')
                                                @if($autorisation->ok===1)
                                                    <div class="xx-small flex-nowrap"><i class="fas fa-car"></i> Peut
                                                        etre
                                                        transporté par quelqu'un du club
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach

                                        @foreach($remarques as $remarque)
                                            @if (($remarque->typeRq_id=="1"))
                                                <p class="fonce">Remarques : {{$remarque->remarque}}
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">En cas d'urgence :</div>
                            <div class="card-body">
                                <p> Personne à prevenir :{{$adherent->nomUrgence}},<br/>
                                @foreach($telephones as $telephone)
                                    @if ($telephone->typeTel_id==4)
                                        <p>Téléphone:{{$telephone->numero}}</p>
                                    @endif
                                @endforeach
                                @foreach($autorisations as $autorisation)
                                    @if ($autorisation->typeAuto_id=='1')
                                        @if($autorisation->ok===1)
                                            <div class="xx-small "><i class="fas fa-ambulance"></i> Les animateurs
                                                sont
                                                autorisés à mettre en oeuvre, des traitements, hospitalisations et
                                                interventions
                                                nécessaires en cas d'urgence.
                                            </div>
                                        @else
                                            <div class="xx-small flex-nowrap"><i
                                                    class="fas fa-ambulance large barre"></i> Les
                                                animateurs NE SONT PAS autorisés à mettre en oeuvre, des traitements,
                                                hospitalisations et interventions nécessaires en cas d'urgence.
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                                @foreach($remarques as $remarque)
                                    @if (($remarque->typeRq_id=="2"))
                                        <p class="fonce">Remarques : {{$remarque->remarque}}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <br/>
                </div>
                <br/>
                <div class="row haut ">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Dossier d'inscription :</div>
                            <div class="card-body xx-small">
                                <table>
                                    <thead>
                                    @foreach($dossier as $dossier)
                                        {!! Form::model($dossier, ['route'=>['dossier.update', $dossier->id],'method'=>'get']) !!}
                                        <tr>
                                            <th class="small">Certif médical</th>
                                            <th class="small">Photo</th>
                                            <th class="small">Autorisations</th>
                                            <th class="small">Payement</th>
                                            <th class="small">Attestation</th>
                                            <th class="small"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        @if($dossier->certifMedical===1)
                                            <td><input checked type="radio" name="certifMedical" id="certifMedicalT"
                                                       value="1">
                                                <label class="xx-small"
                                                       for="certifMedicalT"> ok </label><br/>
                                                <input type="radio" name="certifMedical" id="certifMedicalF" value="0">
                                                <label
                                                    class="xx-small" for="certifMedicalF">pas ok</label><br/></td>
                                        @else
                                            <td><input type="radio" name="certifMedical" id="certifMedicalT" value="1">
                                                <label
                                                    class="xx-small" for="certifMedicalT"> ok </label><br/>
                                                <input checked type="radio" name="certifMedical" id="certifMedicalF"
                                                       value="0">
                                                <label class="xx-small"
                                                       for="certifMedicalF">pas ok</label><br/></td>
                                        @endif
                                        @if($dossier->photo===1)
                                            <td><input checked type="radio" name="photo" id="photoT" value="1"> <label
                                                    class="xx-small" for="photoT"> ok </label><br/>
                                                <input type="radio" name="photo" id="photoF" value="0"> <label
                                                    class="xx-small" for="photoF">pas ok</label><br/></td>
                                        @else
                                            <td><input type="radio" name="photo" id="photoT" value="1"> <label
                                                    class="xx-small" for="photoT"> ok </label><br/>
                                                <input checked type="radio" name="photo" id="photoF" value="0"> <label
                                                    class="xx-small" for="photoF">pas ok</label><br/></td>
                                        @endif
                                        @if($dossier->autorisationsRendues===1)
                                            <td><input checked type="radio" name="autorisationsRendues" id="autorisationsRenduesT" value="1"> <label
                                                    class="xx-small" for="autorisationsRenduesT"> ok </label><br/>
                                                <input type="radio" name="autorisationsRendues" id="autorisationsRenduesF" value="0"> <label
                                                    class="xx-small" for="autorisationsRenduesF">pas ok</label><br/></td>
                                        @else
                                           <td><input  type="radio" name="autorisationsRendues" id="autorisationsRenduesT" value="1"> <label
                                                    class="xx-small" for="autorisationsRenduesT"> ok </label><br/>
                                                <input checked type="radio" name="autorisationsRendues" id="autorisationsRenduesF" value="0"> <label
                                                    class="xx-small" for="autorisationsRenduesF">pas ok</label><br/></td>
                                            @endif
                                        @if($dossier->payementOk===1)
                                             <td><input checked type="radio" name="payementOk" id="payementOkT"
                                                       value="1">
                                                <label class="xx-small"
                                                       for="payementOkT"> ok </label><br/>
                                                <input type="radio" name="payementOk" id="payementOkF" value="0">
                                                <label
                                                    class="xx-small" for="payementOkF">pas ok</label><br/></td>
                                        @else
                                           <td><input  type="radio" name="payementOk" id="payementOkT"
                                                       value="1">
                                                <label class="xx-small"
                                                       for="payementOkT"> ok </label><br/>
                                                <input checked type="radio" name="payementOk" id="payementOkF" value="0">
                                                <label
                                                    class="xx-small" for="payementOkF">pas ok</label><br/></td>
                                        @endif
                                        @if($dossier->recuDemande===1)
                                            <td><input checked type="radio" name="recuDemandeOk" id="recuDemandeT"
                                                       value="1">
                                                <label
                                                    class="xx-small" for="recuDemandeT">A fournir</label><br/>
                                                <input hidden type="radio" name="payementOk" id="payementOkF" value="0">
                                                <label
                                                    class="xx-small" for="payementOkF"></label><br/></td>
                                        @else
                                            <td><input type="radio" name="recuDemandeOk" id="recuDemandeT" value="1">
                                                <label
                                                    class="xx-small" for="recuDemandeT">A fournir</label><br/>
                                                <input hidden checked type="radio" name="payementOk" id="payementOkF"
                                                       value="0">
                                                <label
                                                    class="xx-small" for="payementOkF"></label><br/></td>
                                        @endif

                                        <td>  {!! Form::submit('Envoyer', ['class' => 'btn btn-warning']) !!}

                                        </td>
                                        {!! Form::close() !!}
                                        @endforeach
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{--                @if (Auth::user()->fonction_id==1|Auth::user()->fonction_id==2|Auth::user()->fonction_id==3)--}}
                    {{--        <div class="col-md-6">--}}
                    {{--            <div class="card">--}}
                    {{--                <div class="card-header">Payement :</div>--}}
                    {{--                <div class="card-body">--}}
                    {{--                    @foreach($dossier as $dossier)--}}
                    {{--                        @if($dossier->payementOk =="1")--}}
                    {{--                            <p>A jours pour le payement</p>--}}
                    {{--                        @else--}}
                    {{--                            <div class="rose">N'est pas à jours pour le payement</div>--}}
                    {{--                        @endif--}}
                    {{--                        @if($dossier->aidesSociales =="1")--}}
                    {{--                            <p>Une demande d'aides sociales à été faite</p>--}}
                    {{--                        @endif--}}
                    {{--                        @if($dossier->recuDemande  =="1")--}}
                    {{--                            <p>Un reçu est demandé</p>--}}
                    {{--                        @endif--}}
                    {{--                    @endforeach--}}
                    {{--                    @foreach($remarques as $remarque)--}}
                    {{--                        @if (($remarque->typeRq_id=="3"&&Auth::user()->fonction_id==1))--}}
                    {{--                            <p class="fonce">Remarques : {{$remarque->remarque}}--}}
                    {{--                                @endif--}}
                    {{--                                @endforeach--}}
                    {{--                            </p>--}}
                    {{--                            <h4 class="fonce"> Montant total : </h4>--}}

                    {{--                            <table class="xx-small w-100">--}}
                    {{--                                <thead>--}}
                    {{--                                <tr>--}}
                    {{--                                    <th>Moyen payement</th>--}}
                    {{--                                    <th>Montant</th>--}}
                    {{--                                    <th>A encaisser le</th>--}}
                    {{--                                    <th>Numéro de chéque</th>--}}
                    {{--                                </tr>--}}
                    {{--                                </thead>--}}
                    {{--                                <tbody>--}}
                    {{--                                @foreach($payements as $payement)--}}
                    {{--                                    <tr>--}}
                    {{--                                        <th>$payement->moyensPayement_id->type</th>--}}
                    {{--                                        <th>$payement->montant</th>--}}
                    {{--                                        <th>$payement->encaisseMois</th>--}}
                    {{--                                        <th>$payement->numCheque</th>--}}
                    {{--                                    </tr>--}}
                    {{--                                @endforeach--}}

                    {{--                                </tbody>--}}
                    {{--                            </table>--}}
                    {{--                        @else--}}
                    {{--                            {!! link_to_route('dossier.create', 'Modifier', $dossier->id, ['class' => 'btn btn-warning btn-small'])  !!}--}}
                    {{--                </div>--}}
                    {{--@endif--}}

                </div>
            </div>
        </div>
    </div>


    @endforeach
    {{--@endforeach--}}
@endsection
