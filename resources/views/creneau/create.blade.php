@extends('layouts.app')
@section('content')
  <br/>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header section1">Création d'un creneau</div>
          <div class="card-body section1">
            {!! Form::open(['route'=>'creneau.store','class'=>'form-horizontal creneau']) !!}
            <div class="row display-5">
              <div class="col-4">
                <div class="form-group {!! $errors->has('jour_id') ? 'has-error' : '' !!}">
                  <label>Jour:</label><br/>
                  <select name="jour_id" id="jour_id" cols="10">
                    @foreach($jours as $jour)
                      <option value="{!! $jour->id !!}">{!! $jour->jour !!}</option>
                    @endforeach
                  </select>
                </div>
                @if ($errors->has('jour_id'))
                  <small class="help-block">{{$errors->first('jour_id',':message') }}</small>  @endif
              </div>
              <div class="col-4">
                <div class="form-group {!! $errors->has('heure_debut') ? 'has-error' : '' !!}">
                  <div class="form-group {!! $errors->has('min_debut') ? 'has-error' : '' !!}">
                    <label>Heure de début:</label><br/>
                    <div class="row">
                      <select name="heure_debut" id="heure_debut">
                        @for($i=8;$i<22;$i++)
                          <option value={{$i}}>{{$i}}</option>
                        @endfor
                      </select>
                      <div> h</div>
                      <select name="min_debut" id="min_debut">
                        <option value='00'>00</option>
                        <option value='10'>10</option>
                        <option value='20'>20</option>
                        <option value='30'>30</option>
                        <option value='40'>40</option>
                        <option value='50'>50</option>
                      </select>
                      <div> min</div>
                    </div>
                  </div>
                  @if ($errors->has('heure_debut'))
                    <small
                      class="help-block">{{$errors->first('heure_debut',':message') }}</small>  @endif
                  @if ($errors->has('min_debut'))
                    <small
                      class="help-block">{{$errors->first('min_debut',':message') }}</small>  @endif
                </div>
              </div>
              <div class="col-4">
                @if ($errors->has("duree"))
                  <small class="help-block">{{$errors->first("duree",':message') }}</small>  @endif
                <label>durée:</label><br/>
                <select name="duree" id="duree">
                  <option value='45min'>45min</option>
                  <option value='1h'>1h</option>
                  <option value='1h15'>1h15</option>
                  <option value='1h30'>1h30</option>
                  <option value='1h45'>1h45</option>
                  <option value='2h'>2h</option>
                  <option value='2h30'>2h30</option>
                  <option value=3h'>3h</option>
                </select>
              </div>
              @if ($errors->has('duree'))
                <small class="help-block">{{$errors->first('duree',':message') }}</small>  @endif

            </div>
            <br/>
            <div class="row display-5">
              <div class="col-6">
                <label for="lieu_id">Lieux :</label><br/>
                @foreach($lieux as $lieu)
                  <input type="radio" name="lieu_id" value="{!! $lieu->id!!}"/>
                  <label for="{!! $lieu->id!!}"> {!! $lieu->nom!!} </label><br/>
                @endforeach
              </div>
              <div class="col-6">
                <label for="user_id">Entraineur(s) :</label><br/>
                @foreach($users as $user)
                  @if($user->fonction_id==4)
                    <input type="checkbox" name="user_id" value="{!! $user->id!!}"/>
                    <label for="{!! $user->id!!}"> {!!$user->prenom!!} </label><br/>
                  @endif
                @endforeach
              </div>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary">Créer</button>
          </div>
          {!! Form::close()!!}
        </div>
      </div>
    </div>
  </div>
  <div class="row back">

          <a href="javascript:history.back()" class="btn-back ">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
          </a>

    </div>



@endsection
