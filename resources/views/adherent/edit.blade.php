@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                       <span
                           class="card-header display-6">Fiche de : {{" "}}   {{$adherent->prenom}} {{$adherent->nom}}  </span>
                        <ul class="nav  nav-pills  nav-stacked fiche ">
                            <li class="active bandeRose"><a data-toggle="tab" href="#identite"><i
                                        class="fas fa-id-card rose"></i><br/>
                                    Identité</a></li>
                            <li class="bandeBleu"><a data-toggle="tab" href="#entrainement"><i
                                        class="fas fa-dumbbell Bleu"></i><br/>
                                    Entrainement</a></li>
                            <li class="bandeRouge"><a data-toggle="tab" href="#urgence"><i
                                        class="fas fa-briefcase-medical Rouge"></i><br/>
                                    En cas d'urgence</a></li>
                            <li class="bandeHotpink"><a data-toggle="tab" href="#inscription"><i
                                        class="fas fa-copy Hotpink"></i><br/>
                                    Dossier d'inscription</a></li>
                            <li class="bandeCyan"><a data-toggle="tab" href="#payement"><i
                                        class="fas fa-money-bill-wave Cyan"></i><br/>
                                    Payement</a></li>
                            <li class="bandeJaune"><a data-toggle="tab" href="#autres"><i
                                        class="fas fa-highlighter Jaune"></i><br/>
                                    Autres remarques</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">

                            <div id="identite" class="tab-pane fade-in active">
                                <form action='./adherent/{{$adherent->id}}' method="post">
                                    {!!csrf_field ()  !!}
                                    {{method_field ("put")}}
                                    <input type="hidden" class="type" name="type" value="identite"/>
                                    <div class="row ">
                                        <div class="col-10">
                                            Adresse :<input type="text" class="form-invisible col-4" name="adresse"
                                                            placeholder="{{$adherent->adresse}}">
                                            - <input type="text" class="form-invisible col-2" name="cp"
                                                     placeholder="{{$adherent->cp}} "> <input type="text"
                                                                                              class="form-invisible col-3"
                                                                                              name="ville"
                                                                                              placeholder="{{$adherent->ville}} ">
                                        </div>
                                        <div class="col-2">
                                            <i class="fas fa-id-card onglet rose"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">
                                            <p>Date de
                                                naissance: {{strftime("%d/%m/%G", strtotime( $adherent->dateNaissance))}}</p>
                                        </div>

                                        <div class="col-4">
                                            à {{$adherent->lieuNaissance}}
                                        </div>
                                        <div class="col-3">
                                            {{$adherent->sexe}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php $resp2 = 0?>
                                        @foreach($adherent->telephones as $telephone )
                                            @if($telephone->typeTel_id==1)
                                                <div class="col-12">
                                                    Téléphone adhérent: <input type="text"
                                                                               class="form-invisible"
                                                                               name="telephone_adherent"
                                                                               placeholder="{{$telephone->numero}}">
                                                </div>
                                            @elseif($telephone->typeTel_id==2)
                                                <div class="col-6">
                                                    Téléphone responsable legal 1: <input type="text"
                                                                                          class="form-invisible "
                                                                                          name="telephone_Resp1"
                                                                                          placeholder="{{$telephone->numero}}">
                                                </div>

                                            @elseif($telephone-> typeTel_id==3)
                                                <?php $resp2 = 1?>
                                                <div class="col-6">
                                                    Téléphone responsable legal 2: <input type="text"
                                                                                          class="form-invisible"
                                                                                          name="telephone_Resp2"
                                                                                          placeholder="{{$telephone->numero}}">
                                                </div>
                                            @endif
                                        @endforeach
                                        <div class="input_tel col-6">
                                            @if($resp2!=1)
                                                <button class="ajouterTel btn-small btn btn-link">Ajouter numéro de
                                                    téléphone
                                                </button>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class=" col-6">
                                            Email: <input type="email" class="form-invisible" name="email1"
                                                          placeholder="{{$adherent->email1}}">
                                        </div>
                                        @if(isset($adherent->email2)&&$adherent->email2!='null')
                                            <div class="col-6">
                                                et <input type="email" class="form-invisible" name="email1"
                                                          placeholder="{{$adherent->email2}}">
                                            </div>

                                        @else
                                            <div class="col-6">
                                                <div class="input_mail">
                                                    <button class="ajouterMail btn-small btn btn-link">Ajouter une
                                                        adresse mail
                                                    </button>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-12">
                                                <h5 class="violet"> Les champs en violet peuvent être modifiés.</h5>
                                                <button type="submit" class="btn btn-primary btn pull-right">Enregistrer
                                                    les modifications
                                                </button>
                                            </div>
                                    </div>
                                </form>
                            </div>

                        <div id="entrainement" class="tab-pane fade-in">
                            <form action='./adherent/{{$adherent->id}}' method="post">
                                {!!csrf_field ()  !!}
                                {{method_field ("put")}}
                                <input type="hidden" class="type" name="type" value="entrainement"/>
                                <div class="row">
                                    <div class="col-10">
                                        <h4 class="fonce">Section : <input type="text" class="form-invisible"
                                                                           name="groupe"
                                                                           placeholder="{{$adherent->section->nom}}">
                                        </h4>
                                        <h4 class="fonce">Groupe :
                                            @isset($adherent->groupe){{$adherent->groupe->nom}}  ou
                                            @endisset
                                            <select name="groupe" id="groupe" cols="10">
                                                <option value="">choisir dans la liste</option>
                                                @foreach($groupes as $groupe)
                                                    <option value="{!!$groupe->id!!}"> {!! $groupe->nom!!}</option>
                                                @endforeach
                                            </select></h4>


                                            {{--                                        @if (count($adherent->creneaux))--}}

                                            {{--                                            @foreach($adherent->creneaux as $creneau)--}}
                                            {{--                                                le:  {{($creneau->jour)}} à {{($creneau->heure_debut)}}--}}
                                            {{--                                                h {{($creneau->min_debut)}}--}}
                                            {{--                                            @endforeach--}}
                                            {{--                                        @endif--}}
                                            Ajouter un créneau
                                            <select name="creneau" id="creneau" cols="10">
                                                <option value="">choisir dans la liste</option>
                                                @foreach($creneaux as $creneau)
                                                    <option value="{!!$creneau->id!!}"> le {!!$creneau->jour->jour!!}
                                                        à {{$creneau->heure_debut}}h{{$creneau->min_debut}}</option>
                                                @endforeach
                                            </select></p>
                                    </div>
                                    <div class="col-2">
                                        <i
                                            class="fas fa-dumbbell  onglet Bleu"></i>
                                    </div>
                                    <div class="col-12">
                                        <h5 class="violet"> Les champs en violet peuvent être modifiés.</h5>
                                        <button type="submit" class="btn btn-primary btn pull-right">Enregistrer
                                            les modifications
                                        </button>
                                    </div>
                                </div>
                            </form>

                        <div class="col-12">
                            <h4 class="rose">Autorisations</h4>
                            @foreach($adherent->autorisations as $autorisation)
                                @if($autorisation->typeAuto_id==2)
                                    <div class="autorisation row">
                                        @if($autorisation->ok==1)

                                            <div>
                                                <i class="fas fa-car onglet Vert2"></i>
                                            </div>
                                            <div>
                                                Le(la) gymnaste peut etre transporté par un membre du club
                                            </div>
                                            <div>
                                                {!! link_to_route('autorisation.update', 'Modifier',['id'=>$autorisation->id,'adherent_id'=>$adherent->id], ['class' => 'changerAutorisationTransport  btn-autorisation btn btn-link']) !!}</div>
                                        @else
                                            <div>
                                                <i class="fas fa-car onglet Rouge line"></i>
                                            </div>
                                            <div>
                                                Le(la) gymnaste ne peut pas etre transporté par un membre du club
                                            </div>
                                            <div>
                                              {!! link_to_route('autorisation.update', 'Modifier',['id'=>$autorisation->id,'adherent_id'=>$adherent->id], ['class' => 'changerAutorisationTransport  btn-autorisation btn btn-link']) !!}
                                            </div>

                                        @endif
                                    </div>
                                @elseif($autorisation->typeAuto_id==3 )
                                    <div class="autorisation row">
                                    @if($autorisation->ok==1)
                                        <div>
                                            <i class="fas fa-camera onglet Vert2"></i>
                                        </div>
                                        <div>
                                            Le(la) gymnaste peut etre photographié pour les besoins du club
                                        </div>
                                        <div>
                                            {!! link_to_route('autorisation.update', 'Modifier',['id'=>$autorisation->id,'adherent_id'=>$adherent->id], ['class' => 'changerAutorisationTransport  btn-autorisation btn btn-link']) !!}</div>
                                    @else
                                        <div>
                                            <i class="fas fa-camera onglet Rouge line"></i>
                                        </div>
                                        <div>
                                            Le(la) ne peut gymnaste pas etre photographié.
                                        </div>
                                        <div>
                                          {!! link_to_route('autorisation.update', 'Modifier',['id'=>$autorisation->id,'adherent_id'=>$adherent->id], ['class' => 'changerAutorisationTransport  btn-autorisation btn btn-link']) !!}
                                        </div>
                                        @endif
                        </div>

                            @elseif($autorisation->typeAuto_id==4)
                                    <div class="row autorisation">
                                        @if( $autorisation->ok==1)
                                <div>
                                    <i class="fas fa-user-clock onglet Vert2"></i>
                                </div>
                                <div>
                                    Le(la) gymnaste est autorisé à partir seul à la fin de l'entrainement
                                </div>
                                <div>
                                    {!! link_to_route('autorisation.update', 'Modifier',['id'=>$autorisation->id,'adherent_id'=>$adherent->id], ['class' => 'changerAutorisationTransport  btn-autorisation btn btn-link']) !!}</div>
                                </div>
                            @else
                                <div>
                                    <i class="fas fa-user-clock onglet Rouge line"></i>
                                </div>
                                <div>
                                    Le(la) gymnaste n'est pas autorisé à partir seul à la fin de l'entrainement
                                </div>
                                <div>
                                    {!! link_to_route('autorisation.update', 'Modifier',['id'=>$autorisation->id,'adherent_id'=>$adherent->id], ['class' => 'changerAutorisationTransport  btn-autorisation btn btn-link']) !!}
                                </div>
                                            @endif
                        </div>
                        @endif
                        @endforeach
                        </div>

                     <div id="urgence" class="tab-pane fade-in">
                            <form action='./adherent/{{$adherent->id}}' method="post">
                                {!!csrf_field ()  !!}
                                {{method_field ("put")}}
                                <input type="hidden" class="type" name="type" value="urgence"/>
                                <div class="row">
                                    <div class="col-10">
                                      <h4 class="rose">Personne à prevenir en cas d'urgence : <input type="text" class="form-invisible" name="groupe" placeholder="{{$adherent->nomUrgence}}">
                                        </h4>
                                    </div>
                                    <div class="col-2">
                                        <i
                                        class="fas fa-briefcase-medical onglet Rouge"></i><br/><br/>
                                    </div>
                                     @foreach($adherent->telephones as $telephone )
                                            @if($telephone->typeTel_id==4)
                                    <div class="col-10">
                                      <p class="large" >N° de téléphone:  <input type="text" class="form-invisible" name="groupe" placeholder="{{$telephone->numero}}">
@endif
                                        @endforeach
                                      </p>
                                    </div>
                                        <div class="col-2">
                                          <button type="submit" class="btn btn-primary btn pull-right">Enregistrer
                                            les modifications
                                        </button>
                                        </div>
                                    </div>
                            </form>
 <div class="autorisation row">
                                @foreach($adherent->autorisations as $autorisation)
                                @if($autorisation->typeAuto_id==1)

                                        @if($autorisation->ok==1)
                                            <div>
                                                <i class="fas fa-first-aid onglet Vert2"></i>
                                            </div>
                                            <div>
                                                 Les animateurs sont autorisés à mettre en œuvre en cas d'urgence, les traitements, hospitalisation et intervention reconnus médicalement nécessaires auprès du gymnaste.
                                            </div>
                                            <div>
                                                 {!! link_to_route('autorisation.update', 'Modifier',['id'=>$autorisation->id,'adherent_id'=>$adherent->id], ['class' => 'changerAutorisationTransport  btn-autorisation btn btn-link']) !!}
                                            </div>
                                        @else
                                            <div>
                                                 <i class="fas fa-first-aidonglet line Rouge"></i>
                                            </div>
                                            <div>
                                                 Les animateurs ne sont pas autorisés à mettre en œuvre en cas d'urgence.
                                            </div>
                                            <div>
                                                 {!! link_to_route('autorisation.update', 'Modifier',['id'=>$autorisation->id,'adherent_id'=>$adherent->id], ['class' => 'changerAutorisationTransport  btn-autorisation btn btn-link']) !!}
                                            </div>

                                        @endif
                                    </div>
                                    @endif
                                    @endforeach
            </div>

                 <div id="dossier" class="tab-pane fade-in">
                            <form action='./adherent/{{$adherent->id}}' method="post">
                                {!!csrf_field ()  !!}
                                {{method_field ("put")}}
                                <input type="hidden" class="type" name="type" value="dossier"/>
                               <div class="row">
                                    <div class="col-10">
                                      <h4 class="rose">Dossier d'inscription
                                          <input type="text" class="form-invisible" name="groupe" placeholder="{{$adherent->nomUrgence}}">
                                        </h4>
                                    </div>
                               </div>
                            </form>
                 </div>
                </div>
    </div>
    </div>
    </div>
        </div>
    </div>



    {{--
    {{--                            @endforeach--}}
    {{--                            @foreach($remarques as $remarque)--}}
    {{--                                @if (($remarque->typeRq_id=="3"&&Auth::user()->fonction_id==1))--}}
    {{--                                    <p class="fonce">Remarques : {{$remarque->remarque}}--}}
    {{--                                        @endif--}}
    {{--                                        @endforeach--}}
    {{--                                    </p>--}}
    {{--                                    <h4 class="fonce"> Montant total : </h4>--}}

    {{--                                    <table class="xx-small w-100">--}}
    {{--                                        <thead>--}}
    {{--                                        <tr>--}}
    {{--                                            <th>Moyen payement</th>--}}
    {{--                                            <th>Montant</th>--}}
    {{--                                            <th>A encaisser le</th>--}}
    {{--                                            <th>Numéro de chéque</th>--}}
    {{--                                        </tr>--}}
    {{--                                        </thead>--}}
    {{--                                        <tbody>--}}
    {{--                                        @foreach($payements as $payement)--}}
    {{--                                            <tr>--}}
    {{--                                                <th>$payement->moyensPayement_id->type</th>--}}
    {{--                                                <th>$payement->montant</th>--}}
    {{--                                                <th>$payement->encaisseMois</th>--}}
    {{--                                                <th>$payement->numCheque</th>--}}
    {{--                                            </tr>--}}
    {{--                                        @endforeach--}}

    {{--                                        </tbody>--}}
    {{--                                    </table>--}}
    {{--                                @else--}}
    {{--                                    {!! link_to_route('dossier.create', 'Modifier', $dossier->id, ['class' => 'btn btn-warning btn-small'])  !!}--}}
    {{--                        </div>--}}
    {{--        @endif--}}
    {{--@endforeach--}}




    {{--@endforeach--}}
@endsection
