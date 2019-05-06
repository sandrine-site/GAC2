@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Bienvenue dans l'interface administrateur</h1>
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        Edition
                        <ul class="nav nav-tabs nav-justified admin">
                            <li class="active bandeRose"><a data-toggle="tab" href="#accueil"><i
                                        class="fas fa-home rose"></i><br/>
                                    Accueil</a></li>
                            <li class="bandeBleu"><a data-toggle="tab" href="#tous"> <i
                                        class="fas fa-eye Bleu "></i><br/>
                                    Tous les gymnastes</a></li>
                            <li class="bandeVert2"><a data-toggle="tab" href="#un"> <i
                                        class="fas fa-user-cog Vert2 "></i><br/>
                                    Un gymnaste</a></li>
                            <li class="bandeHotpink"><a data-toggle="tab" href="#groupe"><i
                                        class="fas fa-users-cog Hotpink"></i><br/>
                                    Un groupe</a></li>
                            <li class="bandeJaune"><a data-toggle="tab" href="#section"><i
                                        class="fas fa-users Jaune"></i><br/>
                                    Une section</a></li>
                            <li class="bandeViolette"><a data-toggle="tab" href="#entraineur"> <i
                                        class="fas fa-dumbbell Viollette"></i><br/>
                                    Suivant l'entraineur</a></li>
                            <li class="bandeCyan"><a data-toggle="tab" href="#creneau"> <i
                                        class="far fa-calendar-alt Cyan"></i><br/>
                                    Suivant le creneau</a></li>

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div id="accueil" class="tab-pane fade-in active">
                                <div class="row ">
                                    <div class="col-10">
                                        <h4 class="fonce"> Accueil</h4>
                                    </div>
                                    <div class="col-2">
                                        <i class="fas fa-home  onglet rose"></i>
                                    </div>
                                </div>
                                <br/><br/>
                                <div class=" row display-7">
                                    <a href="{!!route('groupe.index')!!}" class="btn btn-info "><i
                                            class="fas fa-users-cog"></i> Composer des groupes gym</a>
                                    <a href="{!!route('section.index')!!}" class="btn btn-success  "><i
                                            class="fas fa-table"></i> Edition des sections</a>
                                    <a href="{!!route('creneau.index')!!}" class="btn btn-dark "><i
                                            class="far fa-clock"></i> Gestion des creneaux horaire</a>
                                </div>
                                <br/>
                                <div class=" row display-7">
                                    <a href="{!!route('dossier.index')!!}" class="btn btn-vert1 "><i
                                            class="far fa-file-alt"></i> gestion
                                        des dossiers</a>
                                    <a href="#" class="btn btn-vert2 "><i
                                            class="fas fa-money-bill-wave"></i>
                                        Gestion des encaissements</a>
                                    <a href="{!!route('dossier.index')!!}" class="btn btn-warning "><i
                                            class="far fa-file-alt"></i> Gestion des autorisations</a>
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
                                                    <option
                                                        value="{{$adherent->id}}">{{$adherent->nom}} {{$adherent->prenom}} </option>
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
                                <form action='./accueilAdmin.edit' method="post">
                                    {!!csrf_field ()  !!}
                                    {{method_field ("put")}}
                                    <div class="row ">
                                        <div class="col-10">
                                            <h4 class="fonce"> Un groupe</h4>
                                            <p>Choisir dans la liste</p>
                                        </div>

                                        <div class="col-2">
                                            <i class="fas fa-users-cog onglet Hotpink "></i>
                                        </div>
                                        <div class=" col-12 display-5">
                                            <select name="nom" value="nom" id="nom">
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
                                <form action='./accueilAdmin.edit' method="post">
                                    {!!csrf_field ()  !!}
                                    {{method_field ("put")}}
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
                                            <select name="nom" value="nom" id="nom">
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
                                <form action='./accueilAdmin.edit' method="post">
                                    {!!csrf_field ()  !!}
                                    {{method_field ("put")}}
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
                                            <select name="nom" value="nom" id="nom">
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
                                <form action='./accueilAdmin.edit' method="post">
                                    {!!csrf_field ()  !!}
                                    {{method_field ("put")}}
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
                                            <select name="nom" value="nom" id="nom">
                                                <option value=""></option>
                                                @foreach($jours as $jour)
                                                    <option
                                                        value="{{$jour->id}}">{{$jour->jour}} </option>
                                                @endforeach
                                            </select>


                                            <select name="heure_debut" id="heure_debut">
                                                @for($i=8;$i<22;$i++)
                                                    <option value={{$i}}>{{$i}}</option>
                                                @endfor
                                            </select>h


                                            <select name="min_debut" id="min_debut">
                                                <option value='00'>00</option>
                                                <option value='10'>10</option>
                                                <option value='20'>20</option>
                                                <option value='30'>30</option>
                                                <option value='40'>40</option>
                                                <option value='50'>50</option>
                                            </select>min.

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


@endsection
