@extends('layouts.app')
@section('content')

    <h1>Formulaire d'inscription</h1>
    {!! Form::open(['route'=>'adherent.store','class'=>'form-horizontal large']) !!}
    <div class="container">
        <div class="row justify-content-center">
            <div class="card inscription">
                <div class="card-header">Informations adhérent</div>
                <div class="card-body">
                    <div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="nom">Nom de l'adhérent :</label>
                                <input type="text" name="nom" id="nom" class="form-control" value="{{old("nom","")}}"/>
                                @if ($errors->has('nom'))
                                    <small class="help-block">{{$errors->first('nom',':message') }}</small>  @endif
                            </div>
                            <div class="col-sm-6">
                                <label for="prenom">Prenom :</label> <br/>
                                <input type="text" name="prenom" id="prenom" class="form-control"
                                       value="{{old("prenom","")}}"/>
                                @if ($errors->has('prenom'))
                                    <small class="help-block">{{$errors->first('prenom',':message') }}</small>  @endif
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="date_naissance">Date de naissance :</label><br/>
                                <select name="date_naissance_J" id="date_naissance_J">
                                    <option
                                        value="{{old("date_naissance_J","")}}">{{old("date_naissance_J","")}} </option>
                                    @for($i=1;$i<32;$i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                <select name="date_naissance_M" value="{{old("date_naissance_M","")}}"
                                        id="date_naissance_M">
                                    <option
                                        value="{{old("date_naissance_M"," ")}}">{{old("date_naissance_M"," ")}}</option>
                                    @for($i=1;$i<13;$i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                <select type="number" name="date_naissance_A" value="{{old ("date_naissance_A","")}}"
                                        id="date_naissance_A" selected="2010">
                                    <option
                                        value="{{old("date_naissance_A","")}}">{{old("date_naissance_A","")}}</option>
                                    @for($i=2024;$i>1936;$i=$i-1)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                @if ($errors->has("date_naissance_J")||$errors->has("date_naissance_M")||$errors->has("date_naissance_A"))
                                    <small
                                        class="help-block">{{$errors->first('date_naissance',':message') }}</small>  @endif
                            </div>

                            <div class="col-sm-5">
                                <br/>
                                <input type="text" name="lieuNaissance" id="lieuNaissance" class="form-control"
                                       placeholder="lieu de naissance" value="{{old("lieuNaissance","")}}"/>
                                @if ($errors->has('lieuNaissance'))
                                    <small
                                        class="help-block">{{$errors->first('lieu_naissance',':message') }}</small>  @endif
                            </div>
                            <div class="col-sm-3">
                                <label for="sexe">Sexe :</label><br/>
                                @if(old('sexe')=='Fille')
                                    <input checked type="radio" name="sexe" id="sexeF" value="Fille"> <label
                                        for="SexeF">Fille</label><br/>
                                @else
                                    <input type="radio" name="sexe" id="sexeF" value="Fille"> <label
                                        for="SexeF">Fille</label><br/>
                                @endif
                                @if(old('sexe')=='Garçon')
                                    <input checked type="radio" name="sexe" id="sexeG" value="Garçon"> <label
                                        for="SexeG">Garçon</label><br/>
                                @else
                                    <input type="radio" name="sexe" id="sexeG" value="Garçon"> <label
                                        for="SexeG">Garçon</label><br/>
                                @endif
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="telephone_adherent">Téléphone adhérent :</label><br/>
                                <input type="tel" name="telephone_adherent" class="form-control" id="telephone_adherent"
                                       value="{{old ("telephone_adherent","")}}"/>
                                @if ($errors->has('telephone_adherent'))
                                    <small
                                        class="help-block">{{$errors->first('telephone_adherent',':message') }}</small>  @endif
                            </div>
                            <div class="col-sm-4">
                                <h4 class="fonce">Si enfant mineur:</h4>
                                <label for="telephone_Resp1">Téléphone résponsable légal 1:</label><br/>
                                <input type="tel" name="telephone_Resp1" class="form-control" id="telephone_Resp1"
                                       value="{{old ("telephone_Resp1","")}}"/>
                                @if ($errors->has('telephone_Resp1'))
                                    <small
                                        class="help-block">{{$errors->first('telephone_Resp1',':message') }}</small>  @endif
                            </div>
                            <div class="col-sm-4">
                                <label for="telephone_Resp2">Téléphone résponsable légal 2:</label><br/>
                                <input type="tel" name="telephone_Resp2" class="form-control" id="telephone_Resp2"
                                       value="{{old ("telephone_Resp2","")}}"/>
                                @if ($errors->has('telephone_Resp2'))
                                    <small
                                        class="help-block">{{$errors->first('telephone_Resp2',':message') }}</small>  @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row justify-content-center">
            <div class="card inscription">
                <div class="card-header">Adresse</div>
                <div class="card-body">
                    <div class="row haut">
                        <div class="col-4">
                            <input type="text" name="adresse1" id="adresse1" class="form-control" value="{{old ("adresse1","")}}" placeholder="n° nom de la rue"/><br/>
                            {!! $errors->first('adresse1','<small class="help-block">:message</small>') !!}
                            <input type="text" name="adresse2" id="adresse2" class="form-control" value="{{old ("adresse2","")}}" placeholder="Complement d'adresse"/>
                            {!! $errors->first('adresse2','<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="col-4">
                            <input type="text" name="cp" id="cp" class="form-control" placeholder="CP"
                                   value="{{old("cp","")}}" cols="5"/>
                            {!! $errors->first('cp', '<small class="help-block">:message</small>') !!}

                        </div>
                        <div class="col-4">
                            <input type="text" name="ville" id="ville" class="form-control" placeholder="ville"
                                   value="{{old("ville","")}}"/>
                            {!! $errors->first('ville', '<small class="help-block">:message</small>') !!}
                        </div>
                    </div>
                    <div class="row haut">
                        <div class="col-12">
                            <label for="email1"> Email :</label>
                        </div>
                        <div class="col-sm-6">
                            <input type="email" name="email1" class="form-control col-sm-offset-1 col-sm-10" id="email1"
                                   placeholder="Email principal" value="{{old("email1","")}}"/>
                            {!! $errors->first('email1', '<small class="help-block">:message</small>') !!}
                            <p>Vous recevrez une confirmation de votre inscription sur cette adresse email</p>
                        </div>
                        <div class="col-sm-6">
                            <input type="email" name="email2" class="form-control col-sm-offset-1 col-sm-10" id="email2"
                                   placeholder="Email secondaire" value="{{old("email2","")}}"/>
                            {!! $errors->first('email2', '<small class="help-block">:message</small>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row justify-content-center">
            <div class="card inscription">
                <div class="card-header">Cours</div>
                <div class="card-body">
                    <div class="row haut">
                        <div class="col-sm-4">
                            @foreach($sections as $section)
                                @if (old("section_id")==$section->id)
                                    <input type="checkbox" checked name="section_id" id="section_id"
                                           value="{{$section->id}}"/> <label
                                        for="{{$section->id}}">{{$section->nom}}</label><br/>
                                @else
                                    <input type="checkbox" name="section_id" id="section_id" value="{{$section->id}}"/>
                                    <label for="{{$section->id}}">{{$section->nom}}</label><br/>
                                @endif
                            @endforeach
                            {!! $errors->first('section_id', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="col-sm-4">
                            <h4 class="fonce">Remarques concernant les horaires :</h4>
                            <textarea name="entrainement" id="entrainement" class="form-control col-sm-offset-1 col-sm-10"
                                      value="{{old("entrainement","")}}"></textarea>
                            <br/>
                        </div>
                        <div class="col-sm-4">
                            <h4 class="fonce">Pour la gymnastique artistique compétition:</h4>
                            <label for="heureSemaine"> Nombre d'heures par semaine : </label>
                            <select name="heureSemaine" id="heureSemaine" cols="10">

                                <option value="{{old("heureSemaine","")}}">{{old("heureSemaine","")}}</option>
                                <option value="0.75">45min</option>
                                <option value="1">1h</option>
                                <option value="1.5">1h30</option>
                                <option value="2">2h</option>
                                <option value="2.5">2h30</option>
                                <option value="3">3h</option>
                                <option value="3.5">3h30</option>
                                <option value="4">4h</option>
                                <option value="4.5">4h30</option>
                                <option value="5">5h</option>
                                <option value="5.5">5h30</option>
                                <option value="6">6h</option>
                            </select><br/>
                            {!! $errors->first('heureSemaine', '<small class="help-block">:message</small>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row justify-content-center">
            <div class="card inscription">
                <div class="card-header">Autorisation de premiers soins</div>
                <div class="card-body">
                    <div class="row haut">
                        <div class="col-sm-4">
                            @if (old("urgence")==1)
                                <input checked type="radio" name="urgence" id="urgenceT" value="1"> <label
                                    for="urgenceT"> Habilite et autorise </label><br/>
                            @else
                                <input type="radio" name="urgence" id="urgenceT" value="1"> <label for="urgenceT">
                                    Habilite et autorise </label><br/>
                            @endif
                            @if (old("urgence")==0)
                                <input checked type="radio" name="urgence" id="urgenceF" value="0"> <label
                                    for="urgenceF"> N'habilite pas et n'autorise pas </label><br/>
                            @else
                                <input type="radio" name="urgence" id="urgenceF" value="0"> <label for="urgenceF">
                                    N'habilite pas et n'autorise pas </label><br/>
                            @endif
                        </div>
                        <div class="col-sm-8">
                            <p>Les animateurs à la mise en oeuvre en cas d'urgence, des traitements, hospitalisation et
                                intervention reconnus médicalement nécessaires auprès de mon enfant. </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <h4 class="fonce">PERSONNE A PREVENIR EN CAS D'ACCIDENT</h4>
                        <div class="row">
                            <div class="col-7">
                                <input type="text" name="nomUrgence" class="form-control" id="nomUrgence"  value="{{old
                ("nomUrgence","")}}" placeholder='Nom Prenom '/>
                                {!! $errors->first('nomUrgence', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="col-5">
                                <input type="text" name="telUrgence" id="telUrgence" class="form-control" value="{{old("telUrgence","")}}" placeholder='Téléphone'/>
                                {!! $errors->first('telUrgence', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <br/>
                        <textarea name="medicales" id="medicales" placeholder="{{old("medicales","Remarques medicales")}}"  class="form-control"  value="{{old("medicales","")}}" ></textarea>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row justify-content-center">
            <div class="card inscription">
                <div class="card-header">Autorisation de déplacements</div>
                <div class="card-body">
                    <div class="row haut">
                        <div class="col-sm-3">
                            @if(old('deplacements')==1)
                                <input checked type="radio" name="deplacements" id="deplacementT" value="1"> <label
                                    for="deplacementT"> Habilite et autorise </label><br/>
                            @else
                                <input type="radio" name="deplacements" id="deplacementT" value="1"> <label
                                    for="deplacementT"> Habilite et autorise </label><br/>
                            @endif
                            @if(old("deplacements")==0)
                                <input checked type="radio" name="deplacements" id="deplacementF" value="0"> <label
                                    for="deplacementF"> N'habilite pas et n'autorise pas </label><br/>
                            @else
                                <input type="radio" name="deplacements" id="deplacementF" value="0"> <label
                                    for="deplacementF"> N'habilite pas et n'autorise pas </label><br/>
                            @endif
                        </div>
                        <div class="col-sm-offset-2 col-sm-7">
                            <p>Les animateurs et les officiels à transporter mon enfant lors des déplacements durant les
                                divers événements de la saison.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row justify-content-center">
            <div class="card inscription">
                <div class="card-header"> Autorisation Medias</div>
                <div class="card-body">
                    <div class="col-12">
                        <p>Nous pouvons être amenés à utilliser, dans le cadre des publications de l'association G.A.C.,
                            des
                            photos des adhérents.<br/><br/>
                            <em>S'agissant de mineurs ce droit à l'image, mais aussi de façon générale ce droit au
                                respect de la personne,est d'application stricte. En conséquence, aucune photo
                                d'adhérents reconnaissables ne pourra être publiée sur un support sans une autorisation
                                écrite des parents (ou tuteurs, responsables..) indiquant dans quel contexte pédagogique
                                se situe cette photo.Les œuvres des adhérents ne doivent en aucun cas faire état du nom
                                de famille de l'auteur. Seul est autorisé le prénom. C'est pourquoi nous vous demandons
                                de bien vouloir remplir la partie ci-dessous.</em></p><br/>
                    </div>
                    <div class="row haut">
                        <div class="col-sm-3">
                            @if(old('media')==1)
                                <input type="radio" checked name="media" id="mediaT" value="1"> <label for="mediaT">
                                    Habilite et autorise </label><br/>
                            @else
                                <input type="radio" name="media" id="mediaT" value="1"> <label for="mediaT"> Habilite et
                                    autorise </label><br/>
                            @endif
                            @if(old ('media')==0)
                                <input type="radio" checked name="media" id="mediaF" value="0"> <label for="mediaF">
                                    N'habilite pas et n'autorise pas </label><br/>
                            @else <input type="radio" name="media" id="mediaF" value="0"> <label for="mediaF">
                                N'habilite pas et n'autorise pas </label><br/>
                                @endif
                        </div>
                        <div class="col-sm-offset-2 col-sm-7">
                            <p> l'association G.A.C. à utiliser sans contrepartie ma photo ou la photo de mon enfant
                                prise dans le cadre des activités de l'association G.A.C. </p>
                            <ul>
                                <li>Pour le journal de Clapiers</li>
                                <li>Pour le Clapiers info</li>
                                <li>Pour les sites internet</li>
                                <li>Pour la communication interne au club.</li>
                                <li>Pour la réalisation de films ou vidéos</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row justify-content-center">
            <div class="card inscription">
                <div class="card-header">Autorisation fin d'entrainement</div>
                <div class="card-body">
                    <div class="col-12">
                        <p>Chers parents,<br/>
                            Afin de garantir la sécurité de tous, nous vous rappelons que nous ne sommes pas en mesure
                            de laisser partir vos enfants seuls à la fin de leur(s) entraînement(s). Nous vous demandons
                            donc de venir les récupérer, saufautorisation écrite de votre part (cf. ci après). En cas
                            d’autorisation exceptionnelle, merci de bien vouloir nous transmettre préalablement la
                            demande par écrit. De plus, nous vous conseillons de vous assurer de la présence des
                            entraîneurs avant de laisser votre enfant seul sur le parking.</p><br/>
                        @if(old('sortie')==1)
                            <input type="radio" checked name="sortie" id="sortieT" value="1"> <label for="sortieT">
                                Autorise mon fils ou ma fille à quitter seul(e) le lieu d'entraînement ou de compétition
                                et cela sous ma responsabilité. </label><br/>
                            @else
                                <input type="radio" name="sortie" id="sortieT" value="1"> <label for="sortieT"> Autorise
                                    mon fils ou ma fille à quitter seul(e) le lieu d'entraînement ou de compétition et
                                    cela sous ma responsabilité. </label><br/>
                            @endif
                            @if(old('sortie')==0)
                                <input type="radio" checked name="sortie" id="sortieF" value="0"> <label for="sortieF">N'Autorise
                                    pas mon fils ou ma fille à quitter seul(e) le lieu d'entraînement ou de
                                    compétition. </label><br/>
                            @else
                                <input type="radio" checked name="sortie" id="sortieF" value="0"> <label for="sortieF">N'Autorise
                                    pas mon fils ou ma fille à quitter seul(e) le lieu d'entraînement ou de
                                    compétition. </label><br/>
                            @endif
                    </div>
                </div>

            </div>
        </div>
        <br/>
        <p class="important"><strong>Vous recevrez une confirmation de votre inscription, ainsi que les documents à
                imprimer sur votre email après cette étape.</strong></p>
        <p class="fonce"> Si vous ne recevez pas d'email dans les 30 min, veuillez nous écrire à l'adresse :
            gacgym@hotmail.fr</p>
        <p class="rose"> Veuillez remettre à votre entraîneur le dossier, le certificat médical et le paiement. A très
            bientôt!</p>
        {!! Form::submit('Envoyer !', ['class' => 'btn btn-xlarge btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    </div>
    </div>
@endsection
