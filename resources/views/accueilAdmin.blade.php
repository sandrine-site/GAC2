@extends('layouts.app')

@section('content')


  <div class="row">
         <h1> Bienvenue dans l'interface administrateur</h1>
          <div class="partie">
            <div class="col-lg-2 col-md-3 col-sm-4">
              @auth
                <nav class="nav flex-column">
                <a href="{!!route('accueilAdminEdit')!!}" class="small btn-dossier bandeRoseGauche">
                  <i class="fas fa-edit onglet"></i>
                  <div>Edition</div>
                </a>

                <a href={!! route('contact.index') !!} class="small btn-dossier bandeBleuGauche">
                  <i class="fas fa-envelope-open-text onglet"></i>
                  <div>Envoyer un mail</div>
                </a>
                <a href="#" class="small btn-dossier bandeVerte2Gauche">
                  <i class="fas fa-sms onglet"></i>
                  <div>Envoyer un sms</div>
                </a>
                <a href="{!!route('adherent.indexRepartition')!!}" class="small btn-dossier bandeCyanGauche">
                  <i class="fas fa-share-alt onglet"></i>
                  <div>Repartition des Gymnastes</div>
                </a>

                  @if (Auth::user()->fonction_id==1|Auth::user()->fonction_id==2|Auth::user()->fonction_id==3)
                    <div class="dropdownInscriptions  dropright">
                  <a href="#"
                     class="small btn-dossier bandeJauneGauche dropdown-toggle"
                     id="dropdownInscriptions"
                     data-toggle="dropdown"
                     aria-haspopup="true"
                     aria-expanded="false">
                    <i class="far fa-file-alt onglet"></i>
                    <div>Dossiers d'inscription</div>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownInscriptions">
                    <a class="dropdown-item" href="{!!route('autorisation.index')!!}"> Autorisations</a>
                    <a class="dropdown-item" href="{!!route('dossier.index')!!}"> Dossiers</a>
                    <a class="dropdown-item" href="{!!route('payement.index')!!}">Encaissements</a>
                  </div>
                </div>
                  @endif
                  @if (Auth::user()->fonction_id==1|Auth::user()->fonction_id==2)
                    <div class="dropdownGestion  dropright">
                  <a href="#"
                     class="small btn-dossier bandeHotpinkGauche dropdown-toggle"
                     id="dropdownGestion"
                     data-toggle="dropdown"
                     aria-haspopup="true"
                     aria-expanded="false">
                    <i class="fas fa-calendar-week onglet"></i>
                    <div>Gestion du club</div>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownGestion">
                    <a class="dropdown-item" href="{!!route('section.index')!!}"> Sections</a>
                    <a class="dropdown-item" href="{!!route('groupe.index')!!}">Groupes</a>
                    <a class="dropdown-item" href="{!!route('creneau.index')!!}">Creneaux horaires</a>
                  </div>
                </div>

                    <div class="dropdownAdministration  dropright">
                  <a href="#"
                     class="small btn-dossier bandeVioletteGauche dropdown-toggle"
                     id="dropdownAdministration"
                     data-toggle="dropdown"
                     aria-haspopup="true"
                     aria-expanded="false">
                    <i class="fas fa-user-lock onglet"></i>
                    <div>Administration du club</div>
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownAdministration">
                    <a class="dropdown-item" href="{!!route('tarif.index')!!}">  Les tarifs</a>
                    @if (Auth::user()->fonction_id==1)
                      <a class="dropdown-item" href="{!!route('user.index')!!}">  Liste des administrateurs</a>
                      <a class="dropdown-item" href="{!!route('anneeScolaire.store')!!}"> Changer l'année</a>
                    @endif
                  </div></div>
                  @endif
              </nav>
              @endauth
            </div><?php $n=0?>
            <div class="col-lg-10 col-md-9 col-sm-8">
              @foreach($sections as $section)
                <h4 class="fonce">{{$section->nom}} :</h4>
                <div class="partie">

                @foreach($section->groupes as $groupe)
                    <?php $n++?>
                    @isset($groupe->adherents)
                      <div class="card-deck">
                <div class="small card group ">
                  <div class="card-header section{{$n}}">
                    {{$groupe->nom}}<br/>
                    @isset($groupe->categorie)
                      <div class="fonce small"> Catégorie:{{$groupe->categorie}}</div>
                    @endisset
                  </div>
                    <div class="card-body section{{$n}}">
                    @foreach($groupe->adherents as $adherent)

                        {{$adherent->nom}} {{$adherent->prenom}}<br/>

                      @endforeach
</div>
                  </div>
                </div>
                    @endisset
                    @if ($n==7)<?php $n=0?>
                    @endif
                  @endforeach
                </div>
              @endforeach
            </div>
          </div>
        </div>






@endsection
