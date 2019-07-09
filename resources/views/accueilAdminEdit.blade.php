@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header admin">
            Edition:<br/>
            <p>Vous pouvez choisir comment éditer les gymnastes en sélectionnant un des onglets ci-dessous</p>
            <ul class="nav nav-tabs nav-justified admin">
              <li class="bandeBleu"><a data-toggle="tab" class="editBleu" href="#tous"> <i class="fas fa-globe-europe Bleu"></i><br/>
                  Tous les gymnastes</a></li>
              <li class="bandeVert2 "><a data-toggle="tab"class="editVert2" href="#un"><i class="fas fa-user-alt Vert2"></i><br/>
                  Un gymnaste</a></li>
              <li class="bandeHotpink"><a data-toggle="tab" class="editHotpink" href="#groupe"><i class="fas fa-user-friends Hotpink"></i><br/>
                  Un groupe</a></li>
              <li class="bandeJaune"><a data-toggle="tab" class="editJaune"  href="#section"><i
                    class="fas fa-users Jaune"></i><br/>
                  Une section</a></li>
              <li class="bandeViolette"><a data-toggle="tab" class="editViolette" href="#entraineur"> <i
                    class="fas fa-dumbbell Violette"></i><br/>
                  Suivant l'entraineur</a></li>
              <li class="bandeCyan"><a data-toggle="tab" class="editCyan" href="#creneau"> <i class="fas fa-user-clock Cyan"></i><br/>
                  Suivant le creneau</a></li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div id="tous" class="tab-pane">
                <div class="row ">
                  <div class="col-10">
                    <h4 class="fonce"> Tous les gymnastes</h4>
                  </div>
                  <div class="col-2">
                    <i class="fas fa-globe-europe onglet Bleubleu"></i>
                  </div>
                </div>
                <br/>
                <div class="display-2">
                  <a class="btn btn-primary" href={!!route('adherent.index')!!}>Editer <i
                      class="fas fa-edit"></i>
                  </a>
                </div>
              </div>
              <div id="un" class="tab-pane ">
                <form action='{{route("adherent.edit")}}' method="get">
                  {!!csrf_field ()  !!}
                  {{method_field ("get")}}
                  <div class="row ">
                    <div class="col-10">
                      <h4 class="fonce"> Un gymnaste</h4>
                    </div>
                    <div class="col-2">
                      <i class="fas fa-user-cog onglet Vertvert"></i>
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
                  <div class="display-2">
                    <button type="submit" class="btn btn-primary btn">Editer <i
                        class="fas fa-edit"></i>
                    </button>
                  </div>
                </form>
              </div>
              <div id="groupe" class="tab-pane   ">
                <form action='./ByGroup' method="post">
                  {!!csrf_field () !!}
                  <div class="row ">
                    <div class="col-10">
                      <h4 class="fonce"> Un groupe</h4>
                    </div>
                    <div class="col-2">
                      <i class="fas fa-users-cog onglet hotpinkHot "></i>
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
                  <div class="display-2">
                    <button type="submit" class="btn btn-primary btn">Editer <i
                        class="fas fa-edit"></i>
                    </button>
                  </div>
                </form>
              </div>
              <div id="section" class="tab-pane  ">
                <form action='./BySection' method="post">
                  {!!csrf_field () !!}
                  <div class="row ">
                    <div class="col-10">
                      <h4 class="fonce"> Une section</h4>
                    </div>
                    <div class="col-2">
                      <i class="fas fa-users onglet Jaunejaune"></i>
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
                  <div class="display-2">
                    <button type="submit" class="btn btn-primary btn">Editer <i
                        class="fas fa-edit"></i>
                    </button>
                  </div>
                </form>
              </div>
              <div id="entraineur" class=" tab-pane    ">
                <form action='./ByEntraineur' method="post">
                  {!!csrf_field () !!}
                  <div class="row ">
                    <div class="col-10">
                      <h4 class="fonce"> Suivant un entraineur</h4>
                    </div>
                    <div class="col-2">
                      <i class="fas fa-dumbbell onglet VioletteViolette"></i><br/>
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
                  <div class="row display-2">
                    <button type="submit" class="btn btn-primary btn">Editer <i
                        class="fas fa-edit"></i>
                    </button>
                  </div>
                </form>
              </div>
              <div id="creneau" class=" tab-pane    ">
                <form action='./ByCreneau' method="post">
                  {!!csrf_field () !!}
                  <div class="row ">
                    <div class="col-10">
                      <h4 class="fonce"> Suivant un créneau horaire</h4>
                    </div>
                    <div class="col-2">
                      <i class="far fa-calendar-alt onglet Cyancyan"></i>
                    </div>
                  </div>
                  <div class="row display-8">
                    <div class=" col-12 display-5">
                      <select name="creneaux_id" >
                        <option value=""></option>
                        @foreach($creneaux as $creneau)
                          <option
                            value="{{$creneau->id}}"> le {{$creneau->jour->jour}} à {{$creneau->heure_debut}} h  {{$creneau->min_debut}} pendant {{$creneau->duree}} au {{App\Lieu::find($creneau->lieu_id)->nom}} </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <br/>
                  <div class="row display-2">
                    <button type="submit" class="btn btn-primary btn">Editer <i
                        class="fas fa-edit"></i>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row back">
          <a href="javascript:history.back()" class="btn-back">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
          </a>
          <a href="{{route('home')}}"
                                   class="btn-home "
                                   >Accueil administration
                  <i class="fas fa-home"></i>
                </a>
        </div>
      </div>
    </div>
  </div>

@endsection

{{--  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>--}}
{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.0/umd/popper.min.js"></script>--}}
{{--  <script src="js/bootstrap.min.js"></script>--}}

