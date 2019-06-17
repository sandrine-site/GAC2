@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>Bienvenue dans l'interface administrateur</h1>
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header admin">
            Accueil:<br/>
            Edition des gymnastes
            <p>Vous pouvez choisir comment éditer les gymnastes en sélectionnant un des onglets ci-dessous</p>
            <ul class="nav nav-tabs nav-justified admin">
              <li class="active bandeRose"><a data-toggle="tab" href="#accueil"><i class="fas fa-home rose"></i><br/> Accueil</a></li>
              <li class="bandeBleu"><a data-toggle="tab" href="#tous"> <i class="fas fa-globe-europe Bleu"></i><br/>
                  Tous les gymnastes</a></li>
              <li class="bandeVert2 "><a data-toggle="tab" href="#un"><i class="fas fa-user-alt Vert2"></i></i><br/>
                  Un gymnaste</a></li>
              <li class="bandeHotpink"><a data-toggle="tab" href="#groupe"><i class="fas fa-user-friends Hotpink"></i></i><br/>
                  Un groupe</a></li>
              <li class="bandeJaune"><a data-toggle="tab" href="#section"><i
                    class="fas fa-users Jaune"></i><br/>
                  Une section</a></li>
              <li class="bandeViolette"><a data-toggle="tab" href="#entraineur"> <i
                    class="fas fa-dumbbell Viollette"></i><br/>
                  Suivant l'entraineur</a></li>
              <li class="bandeCyan"><a data-toggle="tab" href="#creneau"> <i class="fas fa-user-clock Cyan"></i><br/>
                  Suivant le creneau</a></li>

            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div id="accueil" class="tab-pane fade-in active">
                <div class="row ">
                  <div class="col-10">
                    <h4 class="fonce"> Le début d'année</h4>
                  </div>
                  <div class="col-2">
                    <i class="fas fa-home onglet"></i>
                  </div>
                </div>
                <br/>
                <div class=" row display-8">
                  <a href="{!!route('adherent.indexRepartition')!!}" class="btn-dossier bandeRoseGauche">
                    <i class="fas fa-random onglet"></i>
                    Répartition des gymnastes
                    <p class="smaller"> Répartir les gymnastes en fonction de leur section, des groupes, et des créneaux horaires</p>
                  </a>
                  <a href="{!!route('dossier.index')!!}" class="btn-dossier bandeJauneGauche">
                    <i class="fas fa-check-double onglet"></i>
                    Gestion des autorisations
                    <p class="smaller"> Noter/voir sur quels points les responsables légaux sont d'accords</p>
                  </a>
                  <a href="{!!route('dossier.index')!!}" class="btn-dossier bandeVerte2Gauche">
                    <i class="far fa-file-alt onglet"></i>
                    Gestion des dossiers
                    <p class="smaller"> Noter si les documents ont étés remis au club</p>
                  </a>
                  <a href="#" class="btn-dossier bandeCyanGauche"><i class="fas fa-money-bill-wave onglet "></i> Gestion des encaissements <p class="smaller"> Noter les payements: nature, date, etc.</p></a>


                </div>

                <br/><br/>
                <div class="row ">
                  <div class="col-10">
                    <h4 class="fonce"> Créer/modifier les entrainements</h4>
                  </div>
                </div>
                <br/>
                <div class="row display-7">
                  <a href="{!!route('section.index')!!}" class="btn btn-success  "><i class="far fa-id-badge"></i>  Les sections</a>
                  <a href="{!!route('groupe.index')!!}" class="btn btn-info "><i
                      class="fas fa-users-cog"></i>Les groupes</a>
                  <a href="{!!route('section.index')!!}" class="btn btn-success  "><i class="fas fa-map-marked-alt"></i> Les lieux</a>
                  <a href="{!!route('creneau.index')!!}" class="btn btn-dark "><i
                      class="far fa-clock"></i> Les creneaux horaires</a>
                </div>
                <br/>
              </div>
              <div id="accueil" class="tab-pane fade-in active">
                <div class="row ">
                  <div class="col-10">
                    <h4 class="fonce"> Gestion</h4>
                  </div>
                </div>
                <br/>
                <div class=" row display-7">
                  <a href="{!!route('user.index')!!}" class="btn btn-bleu1  "><i
                      class="far fa-address-book"></i> Liste des administrateurs</a>
                  <a href="{!!route('anneeScolaire.store')!!}" class="btn btn-bleu2"><i
                      class="fas fa-history"></i> Changer l'année </a>
                </div>
              </div>

              <div id="tous" class="tab-pane">
                <div class="row ">
                  <div class="col-10">
                    <h4 class="fonce"> Tous les gymnastes</h4>
                  </div>
                  <div class="col-2">
                    <i class="fas fa-eye  onglet Bleu"></i>
                  </div>
                </div>
                <br/>
                <div class="row boutonsCard">
                  <a class="btn btn-primary btn" href={!!route('adherent.index')!!}>Editer <i
                      class="fas fa-edit"></i>
                  </a>
                  <button type="submit" class='btn btn-vert2 btn'>Envoyer un SMS <i
                      class="fas fa-sms"></i>
                  </button>
                  <button type="submit" class='btn btn-bleu1 btn'>Envoyer un mail <i
                      class="fas fa-envelope-open-text"></i>
                  </button>
                </div>
              </div>

              <div id="un" class="tab-pane fade ">
                <form action='./adherent/edit' method="post">

                  {!!csrf_field ()  !!}
                  {{method_field ("get")}}
                  <div class="row ">
                    <div class="col-10">
                      <h4 class="fonce"> Un gymnaste</h4>
                      <p>Choisir dans la liste</p>
                    </div>

                    <div class="col-2">
                      <i class="fas fa-user-cog onglet Vert2"></i>
                    </div>
                    <div class=" col-12 display-5">
                      <select name="id" id="id">
                        <option value=""></option>
                        @foreach($adherents as $adherent)
                          <option value="{{$adherent->id}}">{{$adherent->nom}} {{$adherent->prenom}} </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <br/>
                  <div class="row boutonsCard">
                    <button type="submit" class="btn btn-primary btn">Editer <i
                        class="fas fa-edit"></i>
                    </button>
                    <button type="submit" class='btn btn-vert2 btn'>Envoyer un SMS <i
                        class="fas fa-sms"></i>
                    </button>
                    <button type="submit" class='btn btn-bleu1 btn'>Envoyer un mail <i
                        class="fas fa-envelope-open-text"></i>
                    </button>
                  </div>
                </form>
              </div>

              <div id="groupe" class="tab-pane fade ">
                <form action='./ByGroup' method="post">
                  {!!csrf_field () !!}
                  <div class="row ">
                    <div class="col-10">
                      <h4 class="fonce"> Un groupe</h4>
                      <p>Choisir dans la liste</p>
                    </div>

                    <div class="col-2">
                      <i class="fas fa-users-cog onglet Hotpink "></i>
                    </div>
                    <div class=" col-12 display-5">
                      <select name="groupe_id">
                        <option value=""></option>
                        @foreach($groupes as $groupe)
                          <option
                            value="{{$groupe->id}}">{{$groupe->nom}} </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <br/>
                  <div class="row boutonsCard">
                    <button type="submit" class="btn btn-primary btn">Editer <i
                        class="fas fa-edit"></i>
                    </button>
                    <button type="submit" class='btn btn-vert2 btn'>Envoyer un SMS <i
                        class="fas fa-sms"></i>
                    </button>
                    <button type="submit" class='btn btn-bleu1 btn'>Envoyer un mail <i
                        class="fas fa-envelope-open-text"></i>
                    </button>
                  </div>
                </form>
              </div>

              <div id="section" class="tab-pane fade">
                <form action='./BySection' method="post">
                  {!!csrf_field () !!}
                  <div class="row ">
                    <div class="col-10">
                      <h4 class="fonce"> Une section</h4>
                      <p>Choisir dans la liste</p>
                    </div>

                    <div class="col-2">
                      <i
                        class="fas fa-users onglet Jaune"></i>
                    </div>
                    <div class=" col-12 display-5">
                      <select name="section_id" >
                        <option value=""></option>
                        @foreach($sections as $section)
                          <option
                            value="{{$section->id}}">{{$section->nom}} </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <br/>
                  <div class="row boutonsCard">
                    <button type="submit" class="btn btn-primary btn">Editer <i
                        class="fas fa-edit"></i>
                    </button>
                    <button type="submit" class='btn btn-vert2 btn'>Envoyer un SMS <i
                        class="fas fa-sms"></i>
                    </button>
                    <button type="submit" class='btn btn-bleu1 btn'>Envoyer un mail <i
                        class="fas fa-envelope-open-text"></i>
                    </button>
                  </div>
                </form>
              </div>

              <div id="entraineur" class=" tab-pane fade  ">
                <form action='./ByEntraineur' method="post">
                  {!!csrf_field () !!}
                  <div class="row ">
                    <div class="col-10">
                      <h4 class="fonce"> Suivant un entraineur</h4>
                      <p>Choisir dans la liste</p>
                    </div>

                    <div class="col-2">
                      <i
                        class="fas fa-dumbbell onglet Viollette"></i><br/>
                    </div>
                    <div class=" col-12 display-5">
                      <select name="id">
                        <option value=""></option>
                        @foreach($users as $user)
                          <option
                            value="{{$user->id}}">{{$user->prenom}} </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <br/>
                  <div class="row boutonsCard">
                    <button type="submit" class="btn btn-primary btn">Editer <i
                        class="fas fa-edit"></i>
                    </button>
                    <button type="submit" class='btn btn-vert2 btn'>Envoyer un SMS <i
                        class="fas fa-sms"></i>
                    </button>
                    <button type="submit" class='btn btn-bleu1 btn'>Envoyer un mail <i
                        class="fas fa-envelope-open-text"></i>
                    </button>
                  </div>
                </form>
              </div>

              <div id="creneau" class=" tab-pane fade  ">
                <form action='./ByCreneau' method="post">
                  {!!csrf_field () !!}
                  <div class="row ">
                    <div class="col-10">
                      <h4 class="fonce"> Suivant un créneau horaire</h4>
                      <p>Choisir dans la liste</p>
                    </div>

                    <div class="col-2">
                      <i class="far fa-calendar-alt onglet Cyan"></i>
                    </div>
                  </div>
                  <div class="row display-8">
                    <div class=" col-6">
                      <select name="creneaux_id" >
                        <option value=""></option>
                        @foreach($creneaux as $creneau)
                          <option
                            value="{{$creneau->id}}"> le {{$creneau->jour->jour}} à {{$creneau->heure_debut}} h  {{$creneau->min_debut}} pendant {{$creneau->duree}} </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <br/>
                  <div class="row boutonsCard">
                    <button type="submit" class="btn btn-primary btn">Editer <i
                        class="fas fa-edit"></i>
                    </button>
                    <button type="submit" class='btn btn-vert2 btn'>Envoyer un SMS <i
                        class="fas fa-sms"></i>
                    </button>
                    <button type="submit" class='btn btn-bleu1 btn'>Envoyer un mail <i
                        class="fas fa-envelope-open-text"></i>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>




@endsection
