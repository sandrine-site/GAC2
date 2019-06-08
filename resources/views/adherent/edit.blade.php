@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header display-6 section5">Fiche de : {{" "}}   {{$adherent->prenom}} {{$adherent->nom}}  </div>
            <div>
            <ul class="nav nav-tabs nav-justified fiche ">
              <li class="active bandeRose"><a data-toggle="tab" href="#identite"><i class="fas fa-id-card rose"></i><br/>Identité</a></li>
              <li class="bandeBleu"><a data-toggle="tab" href="#entrainement"><i class="fas fa-dumbbell Bleu"></i><br/>Entrainement</a></li>
              <li class="bandeRouge"><a data-toggle="tab" href="#urgence"><i class="fas fa-briefcase-medical Rouge"></i><br/> En cas d'urgence</a></li>
              <li class="bandeHotpink"><a data-toggle="tab" href="#inscription"><i class="fas fa-copy Hotpink"></i><br/> Dossier d'inscription</a></li>
              <li class="bandeCyan"><a data-toggle="tab" href="#payement"><i class="fas fa-money-bill-wave Cyan"></i><br/> Payement</a></li>
              <li class="bandeJaune"><a data-toggle="tab" href="#autres"><i class="fas fa-highlighter Jaune"></i><br/> Autres remarques</a></li>
            </ul>
          </div>

          <div class="card-body section5">
            <div class="tab-content">
              <div id="identite" class="tab-pane fade-in active">
                <form action='{{route('adherent.update',$adherent->id)}}' method="post">
                  {!!csrf_field ()  !!}
                  {{method_field ("put")}}
                  <div class="row ">
                    <div class="col-10"> Adresse :
                      <input type="text" class="form-invisible col-4" name="adresse" placeholder="{{$adherent->adresse}}">-
                      <input type="text" class="form-invisible col-2" name="cp" placeholder="{{$adherent->cp}} ">
                      <input type="text" class="form-invisible col-3" name="ville"  placeholder="{{$adherent->ville}} ">
                    </div>
                    <div class="col-2">
                      <i class="fas fa-id-card onglet roserose"></i>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-5">
                      <p>Date de naissance: {{strftime("%d/%m/%G", strtotime( $adherent->dateNaissance))}}</p>
                    </div>
                    <div class="col-4">
                      à {{$adherent->lieuNaissance}}
                    </div>
                    <div class="col-3">
                      {{$adherent->sexe}}
                    </div>
                  </div>
                  <div class="row">
                    <?php $resp2 = 0;
                    $adher=0?>
                    @foreach($adherent->telephones as $telephone )
                        @if($telephone->typeTel_id==1)
                          <?php $adher=1?>
                          <div class="col-12">
                            Téléphone adhérent:
                            <input type="text" class="form-invisible" name="telephone_adherent" placeholder="{{$telephone->numero}}" value="{{old ("telephone_adherent","")}}"/>
                            @if ($errors->has('telephone_adherent'))
                              <small
                                class="help-block">{{$errors->first('telephone_adherent',':message') }}</small> @endif
                          </div>
                        @elseif($telephone->typeTel_id==2)
                          <div class="col-6">
                            Téléphone responsable legal 1: <input type="text" class="form-invisible " name="telephone_Resp1" placeholder="{{$telephone->numero}}" value="{{old ("telephone_Resp1","")}}"/>
                            @if ($errors->has('telephone_Resp1'))
                              <small
                                class="help-block">{{$errors->first('telephone_Resp2',':message') }}</small> @endif
                          </div>
                        @elseif($telephone-> typeTel_id==3)
                          <?php $resp2 = 1?>
                          <div class="col-6">
                            Téléphone responsable legal 2: <input type="text" class="form-invisible" name="telephone_Resp2"  placeholder="{{$telephone->numero}}">
                          </div>
                        @endif
                      @endforeach
                      <div class="col-6">
                        @if ($resp2!=1)
                          <input type="text" class="form-small" name="telephone_Resp2"  placeholder="Téléphone responsable legal 2">
                        @endif
                        @if ($adher!=1)
                            <input type="text" class="form-small" name="telephone_adherent"  placeholder="Téléphone adherent">
                          @endif
                      </div>
                  </div>
                  <div class="row">
                    <div class=" col-6">
                      Email: <input type="email" class="form-invisible" name="email1" placeholder="{{$adherent->email1}}">
                    </div>
                    @if(isset($adherent->email2)&&$adherent->email2!='null')
                      <div class="col-6">
                        et <input type="email" class="form-small" name="email1" placeholder="{{$adherent->email2}}">
                      </div>
                    @else
                      <div class="col-6">
                        <input type="email" class="form-small" name="email2" placeholder="Ajouter une adresse mail">
                      </div>
                    @endif
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <br/>
                      <button type="submit" class="btn btn-primary btn pull-right">
                        Enregistrer les modifications
                      </button>
                    </div>
                  </div>
                </form>
              </div>

              <div id="entrainement" class="tab-pane fade">
                <form action='{{route('adherent.update',$adherent->id)}}' method="post">
                                  {!!csrf_field ()  !!}
                                  {{method_field ("put")}}
                  <div class="row">
                    <div class="col-10">
                      <h4 class="fonce">
                        Section :
                        <input type="text" class="form-invisible" name="section" placeholder="{{$adherent->section->nom}}">
                      </h4>
                      <h4 class="fonce">Groupe :
                        @isset($adherent->groupe){{$adherent->groupe->nom}} ou
                        @endisset
                        <select name="groupe_id" class="form-small"id="groupe_id" cols="10">
                          <option value="">Choisir dans la liste</option>
                          @foreach($groupes as $groupe)
                            <option value="{!!$groupe->id!!}"> {!! $groupe->nom!!}</option>
                          @endforeach
                        </select>
                      </h4>
                    </div>
                    <div class="col-2">
                      <i class="fas fa-dumbbell  onglet Bleubleu"></i>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <label for="heureSemaine"> Nombre d'heures par semaine : </label>
                      <select name="heureSemaine" class="form-invisible" id="heureSemaine" cols="10">
                        <option
                          value="">{{$adherent->heureSemaine}}</option>
                        <option value="45min">45min</option>
                        <option value="1h">1h</option>
                        <option value="1h30">1h30</option>
                        <option value="2h">2h</option>
                        <option value="2h30">2h30</option>
                        <option value="3h">3h</option>
                        <option value="3h30">3h30</option>
                        <option value="4h">4h</option>
                        <option value="4h30">4h30</option>
                        <option value="5h">5h</option>
                        <option value="5h30">5h30</option>
                        <option value="6h">6h</option>
                        <option value="8h">8h</option>
                      </select><br/>
                      @isset($adherent->creneaux)
                        <h4> creneaux d'entrainement:</h4>
                        <ul>
                          @foreach($adherent->creneaux as $creneau)
                            <li>
                              <span class="creneaux">  Le: {{$creneau->jour->jour}} à {{$creneau->heure_debut}}h{{$creneau->min_debut}} pendant {{$creneau->duree}}
                                <a class="btn-creneau btn btn-link" href="../creneau/{{$creneau->id}}/{{$adherent->id}}"  role="button"  ><i class="fas fa-trash-alt"></i></a>
                              </span>          </li>
                          @endforeach
                        </ul>
                      @endisset
                      Ajouter un créneau
                      <select name="creneau" id="creneau" class="form-invisible" cols="10">
                        <option value="">choisir dans la liste</option>
                        @foreach($creneaux as $creneau)
                          <option value="{!!$creneau->id!!}"> le {!!$creneau->jour->jour!!}
                            à {{$creneau->heure_debut}}h{{$creneau->min_debut}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-6">
                      Remarque
                      @php($rq=0)
                      @foreach($adherent->remarques as $remarque)
                        @php($rq=1)
                        @if (isset($remarque)&& $remarque->typeRq_id==1)
                          <textarea  placeholder="{{$remarque->remarque}}"
                                    name="Rq_entrainement"
                                    class="form-control   col-10" ></textarea>
                        @endif
                      @endforeach
                      @if($rq==0)
                        <textarea name="Rq_entrainement" id="Rq_entrainement"class="form-control form-invisible col-10"  placeholder=""></textarea>
                      @endif
                    </div>
                  </div>
                  <div class="row display-rowcard">
                    <button type="submit" class="btn btn-primary btn pull-right">
                      Enregistrer les modifications
                    </button>
                  </div>
                </form>
                <div class="col-12">
                  <h4 class="roserose">Autorisations</h4>
                  @foreach($adherent->autorisations as $autorisation)
                    @if($autorisation->typeAuto_id==2)
                      <div class="autorisation row">
                        @if($autorisation->ok==1)
                          <div>
                            <i class="fas fa-car onglet VertY"></i>
                          </div>
                          <div>
                            Le(la) gymnaste peut etre transporté par un membre du club
                          </div>
                          <div>
                            {!! link_to_route('autorisation.update', 'Modifier',['id'=>$autorisation->id,'adherent_id'=>$adherent->id], ['class' => 'changerAutorisationTransport  btn-autorisation btn btn-link']) !!}
                          </div>
                        @else
                          <div>
                            <i class="fas fa-car onglet RougeN line"></i>
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
                            <i class="fas fa-camera onglet VertY"></i>
                          </div>
                          <div>
                            Le(la) gymnaste peut etre photographié pour les besoins du club
                          </div>
                          <div>
                            {!! link_to_route('autorisation.update', 'Modifier',['id'=>$autorisation->id,'adherent_id'=>$adherent->id], ['class' => 'changerAutorisationTransport  btn-autorisation btn btn-link']) !!}
                          </div>
                        @else
                          <div>
                            <i class="fas fa-camera onglet RougeN line"></i>
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
                            <i class="fas fa-user-clock onglet VertY"></i>
                          </div>
                          <div>
                            Le(la) gymnaste est autorisé à partir seul à la fin de l'entrainement
                          </div>
                          <div>
                            {!! link_to_route('autorisation.update', 'Modifier',['id'=>$autorisation->id,'adherent_id'=>$adherent->id], ['class' => 'changerAutorisationTransport  btn-autorisation btn btn-link']) !!}
                          </div>
                        @else
                          <div>
                            <i class="fas fa-user-clock onglet RougeN line"></i>
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
              </div>
              <div id="urgence" class="tab-pane fade">
                <form action='{{route('adherent.update',$adherent->id)}}' method="post">
                  {!!csrf_field ()  !!}
                  {{method_field ("put")}}
                  <div class="col-8">
                    <div class="row">
                      <div class="col-10">
                        <h4 class="roserose">Personne à prevenir en cas d'urgence :<br/></h4>
                        <h4> <input type="text" class="form-invisible" name="urgence" placeholder="{{$adherent->nomUrgence}}">
                        </h4>
                      </div>
                      <div class="col-2">
                        <i class="fas fa-briefcase-medical onglet Rougerouge"></i><br/><br/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    @foreach($adherent->telephones as $telephone )
                      @if($telephone->typeTel_id==4)
                        <div class="col-6">
                          <p class="large">
                            N° de téléphone:
                            <input type="text" class="form-invisible" name="telephone_Urgence" placeholder="{{$telephone->numero}}">
                          </p>
                        </div>
                      @endif
                    @endforeach
                    <div class="col-6">
                      Remarque
                      @php($rq=0)
                      @foreach($adherent->remarques as $remarque)
                        @php($rq=1)
                        @if (isset($remarque)&& $remarque->typeRq_id==2)
                          <textarea name="Rq_urgence" id="Rq_urgence"
                                    class="form-control form-invisible  col-10"
                                    placeholder="">{{$remarque->remarque}}</textarea>
                        @endif
                      @endforeach
                      @if($rq==0)
                        <textarea name="Rq_urgence" id="Rq_urgence"
                                  class="form-control form-invisible col-10" placeholder="">
                        </textarea>
                      @endif
                      <button type="submit" class="btn btn-primary btn pull-right">Enregistrer les modifications </button>
                      <br/><br/>
                    </div>
                  </div>
                </form>
              <div class="autorisation row">
                @foreach($adherent->autorisations as $autorisation)
                  @if($autorisation->typeAuto_id==1)
                    @if($autorisation->ok==1)
                      <div>
                        <i class="fas fa-first-aid onglet VertY"></i>
                      </div>
                      <div>
                        Les animateurs sont autorisés à mettre en œuvre en cas d'urgence, les traitements, hospitalisation et intervention reconnus médicalement nécessaires auprès du gymnaste.
                      </div>
                      <div>
                        {!! link_to_route('autorisation.update', 'Modifier',['id'=>$autorisation->id,'adherent_id'=>$adherent->id], ['class' => 'changerAutorisationTransport  btn-autorisation btn btn-link']) !!}
                      </div>
                    @else
                      <div>
                        <i class="fas fa-first-aid onglet line RougeN"></i>
                      </div>
                      <div>
                        Les animateurs ne sont pas autorisés à mettre en œuvre en cas d'urgence.
                      </div>
                      <div>
                        {!! link_to_route('autorisation.update', 'Modifier',['id'=>$autorisation->id,'adherent_id'=>$adherent->id], ['class' => 'changerAutorisationTransport  btn-autorisation btn btn-link']) !!}
                      </div>
                    @endif
              @endif
              @endforeach
              </div>
            </div>

            <div id="inscription" class="tab-pane fade">
                <div class="row">
                  <div class="col-10">
                    <h4 class="rose">Dossier d'inscription</h4>
                    <div class="large">
                    <span class="display-6">
                      Certificat médical :&nbsp
                      @if($adherent->CertifMedical==1)
                        <i class="fas fa-check-circle Vertvert"></i>
                        <form action='./dossier/update' method="post">
                          {!!csrf_field ()  !!}
                          <input type="hidden" name="CertifMedical" value="false">
                          <input type="hidden" name="id" value="{{$adherent->id}}">
                          <button type="submit" class="btn-autorisation btn btn-link"><i class="fas fa-exchange-alt"></i></button>
                        </form>
                         @else
                        <i class="fas fa-times-circle Rougerouge"></i>
                        <form action='./dossier/update' method="post">
                          {!!csrf_field ()  !!}
                          <input type="hidden" name="CertifMedical" value="true">
                          <input type="hidden" name="id" value="{{$adherent->id}}">
                          <button type="submit" class="btn-autorisation btn btn-link"><i class="fas fa-exchange-alt"></i></button>
                        </form>
                      @endif
                      </span>
                      <br/>
                      <span class="display-6">
                      Photo:
                      @if($adherent->photo==1)
                        <i class="fas fa-check-circle Vertvert"></i>
                          <form action='./dossier/update' method="post">
                            {!!csrf_field ()  !!}
                            <input type="hidden" name="photo" value="false">
                            <input type="hidden" name="id" value="{{$adherent->id}}">
                            <button type="submit" class="btn-autorisation btn btn-link"><i class="fas fa-exchange-alt"></i></button>
                          </form>
                        @else
                          <i class="fas fa-times-circle Rougerouge"></i>
                          <form action='./dossier/update' method="post">
                            {!!csrf_field ()  !!}
                            <input type="hidden" name="photo" value="true">
                            <input type="hidden" name="id" value="{{$adherent->id}}">
                            <button type="submit" class="btn-autorisation btn btn-link"><i class="fas fa-exchange-alt"></i></button>
                          </form>
                        @endif
                     </span>
                     <br/>
                      <span class="display-6">
                      Autorisations(Forme papier) :
                        @if($adherent->autorisationsRendues==1)
                          <i class="fas fa-check-circle Vertvert"></i>
                          <form action='./dossier/update' method="post">
                            {!!csrf_field ()  !!}
                            <input type="hidden" name="autorisationsRendues" value="false">
                            <input type="hidden" name="id" value="{{$adherent->id}}">
                            <button type="submit" class="btn-autorisation btn btn-link"><i class="fas fa-exchange-alt"></i></button>
                          </form>
                        @else
                          <i class="fas fa-times-circle Rougerouge"></i>
                          <form action='./dossier/update' method="post">
                            {!!csrf_field ()  !!}
                            <input type="hidden" name="autorisationsRendues" value="true">
                            <input type="hidden" name="id" value="{{$adherent->id}}">
                            <button type="submit" class="btn-autorisation btn btn-link"><i class="fas fa-exchange-alt"></i></button>
                          </form>
                           @endif
                      </span>
                      <br/>
                      <span class="display-6">
                        Justificatif de payement demandé
                        @if($adherent->RecuDemande==1)
                          <i class="fas fa-flag Jaunejaune"></i>
                          <form action='./dossier/update' method="post">
                            {!!csrf_field ()  !!}
                            <input type="hidden" name="RecuDemande" value="false">
                            <input type="hidden" name="id" value="{{$adherent->id}}">
                            <button type="submit" class="btn-autorisation btn btn-link"><i class="fas fa-exchange-alt"></i></button>
                          </form>
                      @else
                          <form action='./dossier/update' method="post">
                            {!!csrf_field ()  !!}
                            <input type="hidden" name="RecuDemande" value="true">
                            <input type="hidden" name="id" value="{{$adherent->id}}">
                            <button type="submit" class="btn-autorisation btn btn-link"><i class="fas fa-exchange-alt"></i></button>
                          </form>
                        @endif
                        </span>
                    </div>
                  </div>
                  <div class="col-2">
                    @if($adherent->autorisationsRendues==1&&$adherent->photo==1&&$adherent->CertifMedical==1)
                      <i class="fas fa-smile"></i>
                      <br/>
                      <br/>
                      <br/>
                    @else
                      <i class="fas fa-frown"></i>
                      <br/>
                      <br/>
                      <br/>
                    @endif
                  </div>
                </div>
            </div>

            <div id="payement" class="tab-pane fade">
              <form action='{{route('adherent.update',$adherent->id)}}' method="post">
                {!!csrf_field ()  !!}
                {{method_field ("put")}}
                <div class="row">
                  <div class="col-10">
                    <h4 class="rose">Detail des payements</h4>
                  </div>
                  <div class="col-2">
                    <i class="fas fa-money-bill-wave onglet Cyan"></i
                  </div>
                </div>
                <div class="col-10">
                  Remarque
                  @php($rq=0)
                  @foreach($adherent->remarques as $remarque)
                    @php($rq=1)
                    @if (isset($remarque)&& $remarque->typeRq_id==3)
                      <textarea name="Rq_payement" id="Rq_payement"
                                class="form-control form-invisible  col-10"
                                placeholder="{{$remarque->remarque}}">
                      </textarea>
                    @endif
                  @endforeach
                  @if($rq==0)
                    <textarea name="Rq_payement" id="Rq_payement"
                              class="form-control form-invisible col-10" placeholder="">
                    </textarea>
                  @endif
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary btn pull-right">
                    Enregistrer les modifications
                  </button>
                </div>
              </form>
            </div>

            <div id="autres" class="tab-pane fade">
              <form action='{{route('adherent.update',$adherent->id)}}' method="post">
                {!!csrf_field ()  !!}
                {{method_field ("put")}}
                <div class="col-10">
                  <h4 class="rose">Autres remarques</h4>
                </div>
                <div class="col-10">
                  Remarque
                  @php($rq=0)
                  @foreach($adherent->remarques as $remarque)
                    @php($rq=1)
                    @if (isset($remarque)&& $remarque->typeRq_id==4)
                      <textarea  name= "Rq_autres" id="Rq_autres"
                                 class="form-control form-invisible  col-10"
                                 placeholder="{{$remarque->remarque}}">
                      </textarea>
                    @endif
                  @endforeach
                  @if($rq==0)
                    <textarea name="Rq_autres" id="Rq_autres"
                              class="form-control form-invisible col-10" placeholder="">
                    </textarea>
                  @endif
                </div>
                <div class="col-2">
                  <i class="fas fa-highlighter Jaune"></i>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary btn pull-right">
                    Enregistrer les modifications
                  </button>
                </div>
              </form>
            </div>
          </div>
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

@endsection


