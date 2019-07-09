@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-header display-6 section5">Fiche de : {{" "}}   {{$adherent->prenom}} {{$adherent->nom}}  </div>
          <div>
            <ul class="nav nav-tabs nav-justified fiche ">
            @auth
                <li class="bandeRose"><a data-toggle="tab" class="editRose" href="#identite"><i class="fas fa-id-card rose"></i><br/>Identité</a></li>
                <li class="bandeBleu"><a data-toggle="tab" class="editBleu"href="#entrainement"><i class="fas fa-dumbbell Bleu"></i><br/>Entrainement</a></li>
                <li class="bandeRouge"><a data-toggle="tab" class="editRouge" href="#urgence"><i class="fas fa-briefcase-medical Rouge"></i><br/> En cas d'urgence</a></li>
                @if (Auth::user()->fonction_id==1|Auth::user()->fonction_id==2|Auth::user()->fonction_id==3)
                  <li class="bandeHotpink"><a data-toggle="tab" class="editHotpink" href="#inscription"><i class="fas fa-copy Hotpink"></i><br/> Dossier d'inscription</a></li>
                  <li class="bandeCyan"><a data-toggle="tab" class="editCyan" href="#payement"><i class="fas fa-money-bill-wave Cyan"></i><br/> Payement</a></li>
                  @if (Auth::user()->fonction_id==1|Auth::user()->fonction_id==2)
                    <li class="bandeJaune"><a data-toggle="tab" class="editJaune" href="#autres"><i class="fas fa-highlighter Jaune"></i><br/> Autres remarques</a></li>
                  @endif
                @endif
              @endauth
            </ul>
          </div>

          <div class="card-body section5">
            <div class="tab-content">
              <div id="identite" class="tab-pane">
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

              <div id="entrainement" class="tab-pane  ">
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
                    <div class="col-8">
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
                            <li><div class="row haut">
                                Le: {{$creneau->jour->jour}} à {{$creneau->heure_debut}}h{{$creneau->min_debut}} pendant {{$creneau->duree}}&nbsp
                                @endforeach
                        </ul>
                      @endisset
                    </div>
                    <div class="col-4">
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
                            {!! link_to_route('autorisation.update', 'Modifier',['id'=>$autorisation->id,'adherent_id'=>$adherent->id], ['class' => 'changerAutorisationTransport btn-outline-exchange']) !!}
                          </div>
                        @else
                          <div>
                            <i class="fas fa-car onglet RougeN line"></i>
                          </div>
                          <div>
                            Le(la) gymnaste ne peut pas etre transporté par un membre du club
                          </div>
                          <div>
                            {!! link_to_route('autorisation.update', 'Modifier',['id'=>$autorisation->id,'adherent_id'=>$adherent->id], ['class' => 'changerAutorisationTransport  btn-outline-exchange']) !!}
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
                            {!! link_to_route('autorisation.update', 'Modifier',['id'=>$autorisation->id,'adherent_id'=>$adherent->id], ['class' => 'changerAutorisationTransport btn-outline-exchange']) !!}
                          </div>
                        @else
                          <div>
                            <i class="fas fa-camera onglet RougeN line"></i>
                          </div>
                          <div>
                            Le(la) ne peut gymnaste pas etre photographié.
                          </div>
                          <div>
                            {!! link_to_route('autorisation.update', 'Modifier',['id'=>$autorisation->id,'adherent_id'=>$adherent->id], ['class' => 'changerAutorisationTransport  btn-outline-exchange']) !!}
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
                            {!! link_to_route('autorisation.update', 'Modifier',['id'=>$autorisation->id,'adherent_id'=>$adherent->id], ['class' => 'changerAutorisationTransport  btn-outline-exchange']) !!}
                          </div>
                        @else
                          <div>
                            <i class="fas fa-user-clock onglet RougeN line"></i>
                          </div>
                          <div>
                            Le(la) gymnaste n'est pas autorisé à partir seul à la fin de l'entrainement
                          </div>
                          <div>
                            {!! link_to_route('autorisation.update', 'Modifier',['id'=>$autorisation->id,'adherent_id'=>$adherent->id], ['class' => 'changerAutorisationTransport  btn-outline-exchange']) !!}
                          </div>
                        @endif
                      </div>
                    @endif
                  @endforeach
                </div>
              </div>
              <div id="urgence" class="tab-pane  ">
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
                          {!! link_to_route('autorisation.update', 'Modifier',['id'=>$autorisation->id,'adherent_id'=>$adherent->id], ['class' => 'changerAutorisationTransport btn-outline-exchange']) !!}
                        </div>
                      @else
                        <div>
                          <i class="fas fa-first-aid onglet line RougeN"></i>
                        </div>
                        <div>
                          Les animateurs ne sont pas autorisés à mettre en œuvre en cas d'urgence.
                        </div>
                        <div>
                          {!! link_to_route('autorisation.update', 'Modifier',['id'=>$autorisation->id,'adherent_id'=>$adherent->id], ['class' => 'changerAutorisationTransport  btn-outline-exchange']) !!}
                        </div>
                      @endif
                    @endif
                  @endforeach
                </div>
              </div>

              <div id="inscription" class="tab-pane  ">
                <div class="row">
                  <div class="col-6">
                    <h4 class="rose">Dossier d'inscription</h4>
                  </div>
                    <div class="contentInscription">
                    <div class="large">
                      <div class="display-6">
                        <div class="col-8">
                          Certificat médical :&nbsp
                        </div>
                        <div class="col-4 dossier">
                          @if($adherent->CertifMedical==1)
                            <i class="fas fa-check-circle Vertvert"></i>
                            <form action='{{route('dossier.update')}}' method="post">
                              {!!csrf_field ()  !!}
                              <input type="hidden" name="CertifMedical" value="0">
                              <input type="hidden" name="id" value="{{$adherent->id}}">
                              <button type="submit" class="btn-outline-exchange"><i class="fas fa-exchange-alt"></i></button>
                            </form>
                          @else
                            <i class="fas fa-times-circle Rougerouge"></i>
                            <form action='{{route('dossier.update')}}' method="post">
                              {!!csrf_field ()  !!}
                              <input type="hidden" name="CertifMedical" value="1">
                              <input type="hidden" name="id" value="{{$adherent->id}}">
                              <button type="submit" class="btn-outline-exchange"><i class="fas fa-exchange-alt"></i></button>
                            </form>
                          @endif
                        </div>
                      </div>
                      <div class="display-6">
                        <div class="col-8">
                          Photo:
                        </div>
                        <div class="col-4 dossier">
                          @if($adherent->photo==1)
                            <i class="fas fa-check-circle Vertvert"></i>
                            <form action='{{route('dossier.update')}}' method="post">
                              {!!csrf_field ()  !!}
                              <input type="hidden" name="photo" value="0">
                              <input type="hidden" name="id" value="{{$adherent->id}}">
                              <button type="submit" class="btn-outline-exchange"><i class="fas fa-exchange-alt"></i></button>
                            </form>
                          @else
                            <i class="fas fa-times-circle Rougerouge"></i>
                            <form action='{{route('dossier.update')}}' method="post">
                              {!!csrf_field ()  !!}
                              <input type="hidden" name="photo" value="1">
                              <input type="hidden" name="id" value="{{$adherent->id}}">
                              <button type="submit" class="btn-outline-exchange"><i class="fas fa-exchange-alt"></i></button>
                            </form>
                          @endif
                        </div>
                      </div>
                      <div class="display-6">
                        <div class="col-8">
                          Autorisations(Forme papier) :
                        </div>
                        <div class="col-4 dossier">
                          @if($adherent->autorisationsRendues==1)
                            <i class="fas fa-check-circle Vertvert"></i>
                            <form action='{{route('dossier.update')}}' method="post">
                              {!!csrf_field ()  !!}
                              <input type="hidden" name="autorisationsRendues" value="0">
                              <input type="hidden" name="id" value="{{$adherent->id}}">
                              <button type="submit" class="btn-outline-exchange"><i class="fas fa-exchange-alt"></i></button>
                            </form>
                          @else
                            <i class="fas fa-times-circle Rougerouge"></i>
                            <form action='{{route('dossier.update')}}' method="post">
                              {!!csrf_field ()  !!}
                              <input type="hidden" name="autorisationsRendues" value="1">
                              <input type="hidden" name="id" value="{{$adherent->id}}">
                              <button type="submit" class="btn-outline-exchange"><i class="fas fa-exchange-alt"></i></button>
                            </form>
                          @endif
                        </div>
                      </div>
                      <div class="display-5">
                        <div class="col-8">
                          Justificatif de payement demandé
                        </div>
                        <div class="col-4 dossier">
                          @if($adherent->RecuDemande==1)
                            <i class="fas fa-flag Jaunejaune"></i>
                            <form action='{{route('dossier.update')}}' method="post">
                              {!!csrf_field ()  !!}
                              <input type="hidden" name="RecuDemande" value="0">
                              <input type="hidden" name="id" value="{{$adherent->id}}">
                              <button type="submit" class="btn-outline-exchange"><i class="fas fa-exchange-alt"></i></button>
                            </form>
                          @else
                            <form action='{{route('dossier.update')}}' method="post">
                              {!!csrf_field ()  !!}
                              <input type="hidden" name="RecuDemande" value="1">
                              <input type="hidden" name="id" value="{{$adherent->id}}">
                              <button type="submit" class="btn-outline-exchange"><i class="fas fa-exchange-alt"></i></button>
                            </form>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="col-3 autorisation">
                      @if($adherent->autorisationsRendues==1&&$adherent->photo==1&&$adherent->CertifMedical==1)
                        <i class="fas fa-smile"></i>
                      @else
                        <i class="fas fa-frown"></i>
                      @endif

                      </div>
                    </div>
                  </div>
                </div>
                <div id="payement" class="tab-pane  ">
                <div class="row start">
                  <div class="col-10">
                    <h4 class="rose">Detail des payements</h4>
                    <div class="row">
                      <div class="col-6">
                     <div> Justificatif de payement demandé
                      @if($adherent->RecuDemande==1)
                         <i class="fas fa-flag Jaunejaune"></i>
                         <form action='{{route('dossier.update')}}' method="post">
                          {!!csrf_field ()  !!}
                          <input type="hidden" name="RecuDemande" value="0">
                          <input type="hidden" name="id" value="{{$adherent->id}}">
                          <button type="submit" class="btn-outline-exchange"><i class="fas fa-exchange-alt"></i></button>
                        </form>
                       @else
                         <form action='{{route('dossier.update')}}' method="post">
                          {!!csrf_field ()  !!}
                          <input type="hidden" name="RecuDemande" value="1">
                          <input type="hidden" name="id" value="{{$adherent->id}}">
                          <button type="submit" class="btn-outline-exchange"><i class="fas fa-exchange-alt"></i></button>
                        </form>
                       @endif
                      </div>  </div>
                      <div class="col-6">
                        @if ((($tarifAdhesion+$tarifLicence+$tarifCours)*(1-($adherent->reduction/100)))>($adherent->totalpaye))
                          <i class="fas fa-frown"></i>
                        @elseif ((($tarifAdhesion+$tarifLicence+$tarifCours)*(1-($adherent->reduction/100)))==($adherent->totalpaye))
                          <i class="fas fa-smile"></i>
                        @else<i class="fas fa-exclamation-triangle"></i>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-2">
                    <i class="fas fa-money-bill-wave onglet Cyancyan"></i>
                  </div>
                </div>
                <div class="row start">
                  <div class="col-5">
                    <form action='{{route('adherent.update',$adherent->id)}}' method="post">
                      {!!csrf_field ()  !!}
                      <h5 class="fonce">Detail du prix:</h5>
                      <table class="table-responsive">
                        <thead>
                        <tr>
                          <th></th>
                          <th></th>
                          <th>Prix(€)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>Adhesion au club</td>
                          <td></td>
                          <td>{{$tarifAdhesion}}</td>
                        </tr>
                        <tr>
                          <td>Licence UFOLEP</td>
                          <td> &nbsp {{strftime("%G", strtotime( $adherent->dateNaissance))}}</td>
                          <td>{{$tarifLicence}}</td>
                        </tr>
                        <tr>
                          <td>Cours</td>
                          <td>{{$adherent->heureSemaine}}</td>
                          <td>{{$tarifCours}}</td></tr>
                        <tr>
                          <td>Reduction (%)</td>
                          <td> <input type="text" class="form-invisible" size="6" name="reduction"  placeholder="{{$adherent->reduction}}"> </td>
                        </tr>
                        <tr>
                          <th>
                            Total
                          </th>
                          <th></th>
                          <th>
                            @isset($adherent->tarif)
                              <input type="text" class="form-invisible" name="tarif" size="6" placeholder="{{$adherent->tarif}}">
                            @else
                              <input type="text" class="form-invisible" name="tarif"  size="6" placeholder=" {{($tarifAdhesion+$tarifLicence+$tarifCours)*(1-($adherent->reduction/100))}}">
                            @endisset
                          </th>
                        </tr>
                        </tbody>
                      </table>
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

                      <button type="submit" class="btn btn-primary btn pull-left">
                        Enregistrer les modifications
                      </button>
                    </form>
                  </div>
                </div>

                  <div class="col-7 payement ">
                    <h5 class="fonce">Payements:</h5>
                    <input type="hidden" name="adherent_id" value="{{$adherent->id}}"/>
                    <div class="row strong smaller" id="payement">
                      <div class="col-2">Montant</div>
                      <div class="col-2">Date d'encaissement</div>
                      <div class="col-3">Type</div>
                      <div class="col-2">n°Cheque</div>
                    </div>
                    @isset($adherent->payements)
                      @foreach($adherent->payements as $payement)
                        <div class="row">
                          <form action='{{route('payement.update')}}' method="post">
                            {!!csrf_field ()  !!}
                            <input type="hidden" name="id" value="{{$payement->id}}"/>
                            <input type="hidden" name="adherent_id" value="{{$adherent->id}}"/>
                            <div class="col-2">
                              <input type="text"
                                     class="form-invisible"
                                     size="6"
                                     name="montant"
                                     placeholder="{{isset($payement->montant)?$payement->montant:"€" }}"
                              />
                            </div>
                            <div class="col-2">
                              <input type="text"
                                     class="form-invisible"
                                     size="10"
                                     name="encaisseMois"
                                     placeholder="{{isset($payement->encaisseMois)? $payement->encaisseMois:"jj/mm"}}">
                            </div>
                            <div class="col-3">
                              <select name="moyensPayement_id" cols="10">
                                @isset($payement->moyensPayement_id)
                                  <option selected value="{{$payement->moyensPayement_id}}">{{App\MoyenPayement::find($payement->moyensPayement_id)->type}}</option>
                                @endisset
                                @foreach($moyensPayements as $moyensPayement)
                                  <option value="{{$moyensPayement->id}}">{{$moyensPayement->type}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="col-2">
                              <input type="text"
                                     class="form-invisible"
                                     size="10"
                                     name="numCheque"
                                     placeholder="{{isset($payement->numCheque)? $payement->numCheque:"n°chéque"}}"/>
                            </div>
                            <div class="col-1">
                              <button type="submit" class="btn-outline-exchange"><i class="fas fa-exchange-alt"></i></button>
                            </div>
                          </form>
                          <div class="col-1">
                            <a class="btn-outline-trash"
                               href="{{route('payement.destroy',[$payement->id,$adherent->id])}}"
                               role="button"  >
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </div>
                        </div>
                      @endforeach
                    @endisset
                    <div class="row">
                      <form action='{{route('payement.store')}}' method="post">
                        {!!csrf_field ()  !!}
                        <input type="hidden" name="adherent_id" value="{{$adherent->id}}"/>
                        <div class="col-2">
                          <input type="text"
                                 class="form-invisible"
                                 size="6"
                                 name="montant"
                                 placeholder="€"
                          />
                        </div>
                        <div class="col-2">
                          <input type="text"
                                 class="form-invisible"
                                 size="10"
                                 name="encaisseMois"
                                 placeholder="jj/mm"
                          />
                        </div>
                        <div class="col-3">
                          <select name="moyensPayement_id" cols="10">
                            @foreach($moyensPayements as $moyensPayement)
                              <option value="{{$moyensPayement->id}}">{{$moyensPayement->type}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-2">
                          <input type="text"
                                 class="form-invisible"
                                 name="numCheque"
                                 size="12"
                                 placeholder="n° Cheque"/>
                        </div>>
                        <div class="col-2"><button type="submit" class="btn-outline-cyan">Ajouter un  payement</button>
                        </div>
                      </form>
                    </div>
                    <div class="row">
                      <div class="offset-2 col-2">Total payé</div>
                      <div class="col-2">{{$adherent->totalpaye}} €</div>
                    </div>
                  </div>
                </div>

              <div id="autres" class="tab-pane">
                <form action='{{route('adherent.update',$adherent->id)}}' method="post">
                  {!!csrf_field ()  !!}
                  {{method_field ("put")}}
                  <div class="row">
                    <div class="col-7">
                      <h4 class="rose">Autres remarques</h4>
                    </div>
                    <i class="fas fa-highlighter Jaunejaune"></i>
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
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary  pull-right">
                      Enregistrer les modifications
                    </button>
                    <br/><br/>
                  </div>
                </form>
                <div class="row">
                <div class="col-12">
                <h4>Effacer l'adherent:</h4>
                  {!! Form::open(['method' => 'DELETE', 'route' => ['adherent.destroy', $adherent->id]]) !!}
                  {!! Form::submit('Supprimer', ['class' => 'btn btn-danger', 'onclick' => 'return confirm(\'Vraiment supprimer cet adhérent ?\')']) !!}
                  {!! Form::close() !!}
                                </div>
              </div>
            </div>
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
  </div>


@endsection


