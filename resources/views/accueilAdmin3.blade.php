@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bienvenue dans l'interface administrateur</h1>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edition
                    </div>
                    <div class="card-body">
                        <div class="row display-rowcard">
                            <div class="shadow p-3 bg-white rounded  cardRelief bandeRose">
                                <div class="row display-card">
                                    <div class="col-8">
                                        Tous les gymnastes
                                    </div>
                                    <br/><br/>
                                    <div class="col-3">
                                        <i class="fas fa-eye  beige"></i>
                                    </div>
                                </div>
                                <br/>
                                <div class="row boutonsCard">
                                    <a class="btn btn-primary btn" href={!!route('accueilAdmin.index')!!}><i class="fas fa-edit"></i>
                                    </a>
                                    <button type="submit" class='btn btn-vert2 btn'><i class="fas fa-sms"></i>
                                    </button>
                                    <button type="submit" class='btn btn-bleu1 btn'><i
                                            class="fas fa-envelope-open-text"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="shadow p-3 bg-white rounded cardRelief  bandeVert2">
                                <div class="row display-card">
                                    <div class="col-8">
                                        Un gymnaste
                                        <div class="small">Choisir dans la liste</div>
                                    </div>
                                    {{--                        <form action='./editAccueil' method="post">--}}
                                    {!!csrf_field ()  !!}
                                    {{method_field ("put")}}
                                    <div class="col-3">
                                        <i class="fas fa-user-cog beige"></i>
                                    </div>
                                </div>
                                <select name="nom" value="nom" id="nom">
                                    <option value=""></option>
                                    @foreach($adherents as $adherent)
                                        <option
                                            value="{{$adherent->id}}">{{$adherent->nom}} {{$adherent->prenom}} </option>
                                    @endforeach
                                </select>
                                <div class="row boutonsCard">
                                    <button type="submit" class='btn btn-primary btn'><i class="fas fa-edit"></i>
                                    </button>
                                    <button type="submit" class='btn btn-vert2 btn'><i class="fas fa-sms"></i>
                                    </button>

                                    <button type="submit" class='btn btn-bleu1 btn'><i
                                            class="fas fa-envelope-open-text"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br/><br/>
                        <div class="row display-rowcard">
                            <div class="shadow p-3 bg-white rounded  cardRelief bandeBleu">
                                <div class="row display-card">
                                    <div class="col-8">
                                        Un groupe
                                        <div class="small">Choisir dans la liste</div>
                                    </div>
                                    <div class="col-3">
                                        <i class="fas fa-users beige"></i>
                                    </div>
                                </div>
                                <select name="nom" value="nom" id="nom">
                                    <option value=""></option>
                                    @foreach($groupes as $groupe)
                                        <option
                                            value="{{$groupe->id}}">{{$groupe->nom}} </option>
                                    @endforeach
                                </select>
                                <div class="row boutonsCard">
                                    <button type="submit" class='btn btn-primary btn'><i class="fas fa-edit"></i>
                                    </button>
                                    <button type="submit" class='btn btn-vert2 btn'><i class="fas fa-sms"></i>
                                    </button>

                                    <button type="submit" class='btn btn-bleu1 btn'><i
                                            class="fas fa-envelope-open-text"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="shadow p-3 bg-white rounded  cardRelief bandeJaune">

                                <div class="row display-card">
                                    <div class="col-8">
                                        Section
                                        <div class="small">Choisir dans la liste</div>
                                    </div>
                                    <div class="col-3">
                                        <i class="fas fa-users-cog beige"></i>
                                    </div>
                                </div>
                                <select name="nom" value="nom" id="nom">
                                    <option value=""></option>
                                    @foreach($sections as $section)
                                        <option
                                            value="{{$section->id}}">{{$section->nom}} </option>
                                    @endforeach
                                </select>
                                <div class="row boutonsCard">
                                    <button type="submit" class='btn btn-primary btn'><i class="fas fa-edit"></i>
                                    </button>
                                    <button type="submit" class='btn btn-vert2 btn'><i class="fas fa-sms"></i>
                                    </button>

                                    <button type="submit" class='btn btn-bleu1 btn'><i
                                            class="fas fa-envelope-open-text"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br/><br/>
                        <div class="row display-rowcard">
                            <div class="shadow p-3 bg-white rounded  cardRelief bandeViolette">
                                <div class="row display-card">
                                    <div class="col-8">
                                        Suivant l'entraineur
                                        <div class="small">Choisir dans la liste</div>
                                    </div>
                                    <div class="col-3">
                                        <i class="fas fa-running beige"></i>
                                    </div>
                                </div>
                                <select name="nom" value="nom" id="nom">
                                    <option value=""></option>
                                    @foreach($users as $user)
                                        <option
                                            value="{{$user->id}}">{{$user->name}} </option>
                                    @endforeach
                                </select>
                                <div class="row boutonsCard">
                                    <button type="submit" class='btn btn-primary btn'><i class="fas fa-edit"></i>
                                    </button>
                                    <button type="submit" class='btn btn-vert2 btn'><i class="fas fa-sms"></i>
                                    </button>

                                    <button type="submit" class='btn btn-bleu1 btn'><i
                                            class="fas fa-envelope-open-text"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="shadow p-3 bg-white rounded  cardRelief bandeCyan">
                                <div class="row display-card">
                                    <div class="col-8">
                                        Suivant le creneau
                                        <div class="small">Choisir dans la liste</div>
                                    </div>
                                    <div class="col-3">
                                        <i class="far fa-calendar-alt beige"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <select name="nom" value="nom" id="nom">
                                            <option value=""></option>
                                            @foreach($jours as $jour)
                                                <option
                                                    value="{{$jour->id}}">{{$jour->jour}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <select name="heure_debut" id="heure_debut">
                                            @for($i=8;$i<22;$i++)
                                                <option value={{$i}}>{{$i}}</option>
                                            @endfor
                                        </select>h
                                    </div>
                                    <div class="col-4">
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
                                <div class="row boutonsCard">
                                    <button type="submit" class='btn btn-primary btn'><i class="fas fa-edit"></i>
                                    </button>
                                    <button type="submit" class='btn btn-vert2 btn'><i class="fas fa-sms"></i>
                                    </button>

                                    <button type="submit" class='btn btn-bleu1 btn'><i
                                            class="fas fa-envelope-open-text"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br/>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Gestion
                    </div>
                    <div class="card-body">
                        <div class=" row display-7">
                            <a href="{!!route('groupe.index')!!}" class="btn btn-info large16"><span
                                    class="fas fa-users-cog"></span> Composer
                                des groupes gym</a>
                            <a href="{!!route('section.index')!!}" class="btn btn-success large16"><span
                                    class="fas fa-table"></span> Edition des sections</a>
                            <a href="{!!route('creneau.index')!!}" class="btn btn-dark large16"><span
                                    class="far fa-clock"></span> Gestion des creneaux horaire</a>
                        </div>

                        <br/>
                        <div class=" row display-7">
                            <a href="{!!route('dossier.index')!!}" class="btn btn-vert1 large16"><span
                                    class="far fa-file-alt"></span> gestion
                                des dossiers</a>
                            <a href="#" class="btn btn-vert2 large16"><span class="fas fa-money-bill-wave"></span>
                                Gestion des encaissements</a>
                            <a href="{!!route('dossier.index')!!}" class="btn btn-warning large16"><span
                                    class="far fa-file-alt"></span> Gestion des autorisations</a>
                        </div>
                        <br/>
                        <div class=" row display-7">
                            <a href="{!!route('user.index')!!}" class="btn btn-bleu1 large16"><span
                                    class="far fa-address-book"></span> Liste des administrateurs</a>
                            <a href="{!!route('anneeScolaire.store')!!}" class="btn btn-bleu2 large16"><span
                                    class="fas fa-history"></span> Changer l'année </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
