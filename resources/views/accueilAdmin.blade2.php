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
                        {!! Form::open(['route'=>'editAccueil','class'=>'form-horizontal']) !!}
                            <div class="row haut">
                                <div class="col-4">
                                    Choisissez les gymnastes
                                </div>
                                <div class="col-4">
                                    <input type="checkbox" name="all" id="all"/> <label class="rose text-nowrap"
                                                                                        for="all">Tous les
                                        gymnastes</label>
                                </div>
                                <div class="col-4">
                                    <label class="rose">Un gymnaste</label>
                                    <select name="nom" value="nom" id="nom">
                                        <option value=""></option>
                                        @foreach($adherents as $adherent)
                                            <option
                                                value="{{$adherent->id}}">{{$adherent->nom}} {{$adherent->prenom}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                Ou, vous pouvez sélectionner plusieurs critères dans les listes ci-dessous
                            </div>
                            <div class="row haut">
                                <div class="col-md-3">
                                    <label for="section" class="rose">Section(s):</label><br/>
                                    <input type="checkbox" name="allsection" value="all"/> <label
                                        class="violet small" for="allsection">Tout</label><br/>
                                    @foreach ($sections as $section)
                                        <input type="checkbox" name="section.{{$section->id}}"
                                               value="{{$section->id}}"/> <label class="violet small"
                                            for="{{$section->id}}">{{$section->nom}}</label><br/>
                                    @endforeach
                                    <br>

                                </div>
                                <div class="col-md-3">
                                    <label for="groupe" class="rose">Groupe(s):</label><br/>
                                    <input type="checkbox" name="allgroupe" value="all" /> <label
                                        class="violet small" for="allgroupe">Tout</label><br/>
                                    @foreach ($groupes as $groupe)
                                        <input type="checkbox" name="{{$groupe->id}}" value="{{$groupe->id}}"/> <label class="violet small"
                                                                                                                      for="{{$groupe->id}}">  {{" ".$groupe->nom}}</label><br/>
                                        @endforeach
                                </div>
                                <div class="col-md-3">
                                    <label for="user" class="rose">Entraineur(s):</label><br/>
                                    <input type="checkbox" name="allusers" value="all"/> <label
                                        class="violet small" for="allusers">Tout</label><br/>
                                    @foreach ($users as $user)
                                        <input type="checkbox" name="users.{{$user->id}}" value="{{$user->id}}"/>
                                        <label
                                            class="violet small"
                                            for="{{$user->id}}">{{$user->prenom}}</label><br/>
                                    @endforeach
                                </div>
                                <div class="col-md-3">
                                    <label for="creneau" class="rose">Horaire(s):</label><br/>
                                    <input type="checkbox" name="allcreneaux" value="all"/>
                                    <label
                                        class="violet small" for="allcreneaux" value="all">Tout</label><br/>
                                    @foreach ($creneaux as $creneau)
                                        @foreach(\App\Jour::where('id',$creneau->id)->orderBy('jour')->get() as $jour)
                                            <input type="checkbox" name="creneau.{{$creneau->id}}"
                                                   value="{{$creneau->id}}"/> <label
                                                class="violet small" for="{{$creneau->id}}">{{$jour->jour}}
                                                à {{$creneau->heure_debut}}h{{$creneau->min_debut}}</label>
                                            <br/>
                                        @endforeach
                                    @endforeach
                                </div>

                            </div>
                            <br/>
                            <div class="row display-7">
                                <button class="btn btn-success large16"><span
                                        class="fa fa-at"></span> Envoyer un mail
                                </button>

                                <button class="btn btn-warning large16"><span
                                        class="fa fa-comment-dots"></span> Envoyer un sms
                                </button>
                                {!! Form::submit('Editer', ['class' => 'btn btn-info large16']) !!}
                                {!! Form::close() !!}

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
                        Accées rapide
                    </div>
                    <div class="card-body">
                        <div class=" row display-7">
                            <a href="{!!route('groupe.index')!!}" class="btn btn-info large16"><span class="fas fa-users-cog"></span> Edition
 des groupes gym</a>
                            <a href="{!!route('section.index')!!}" class="btn btn-success large16"><span
                                    class="fas fa-table"></span> Edition des sections</a>
                            <a href="{!!route('creneau.index')!!}" class="btn btn-dark large16"><span
                                    class="far fa-clock"></span> Gestion des creneaux horaire</a>
                        </div>

                        <br/>
                        <div class=" row display-7">
                            <a href="{!!route('dossier.index')!!}" class="btn btn-vert1 large16"><span class="far fa-file-alt"></span> gestion
                                des dossiers</a>
                            <a href="#" class="btn btn-vert2 large16"><span class="fas fa-money-bill-wave"></span>
                                Gestion des encaissements</a>
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
