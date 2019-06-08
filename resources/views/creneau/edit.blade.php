@extends('layouts.app')
@section('content')
  <br/>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header section1">Modification d'un créneau</div>
          <div class="card-body section1">
            {!! Form::open([ 'route' => ['creneau.update', $creneau->id],'class'=>'form-horizontal small']) !!}
            <div class="row display-5">
              <div class="col-4">
                <label>Jour:</label><br/>
                <select name="jour_id" id="jour_id" cols="10" value="{{$creneau->jour->jour}}">
                  <option selected value="{!!$creneau->jour->id !!}" class="rose">{!!$creneau->jour->jour !!}</option>
                  @foreach($jours as $jour)
                    <option value="{!! $jour->id !!}" >{!! $jour->jour !!}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-4">
                <label>Heure de début:</label><br/>
                <div class="row">
                  <select name="heure_debut" id="heure_debut">
                    <option selected value="{!!$creneau->heure_debut!!}">{!!$creneau->heure_debut!!}</option>
                    @for($i=8;$i<22;$i++)
                      <option value={{$i}}>{{$i}}</option>
                    @endfor
                  </select>
                  <div> h</div>
                  <select name="min_debut" id="min_debut">
                    <option selected value="{!!$creneau->min_debut!!}"></option>
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
              <div class="col-4">
                <label>durée:</label><br/>
                <select name="duree" id="duree">
                  <option selected value="{!!$creneau->duree!!}">{!!$creneau->duree!!}</option>
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
            </div>
            <br/>
            <div class="row display-5">
              <div class="col-6">
                <label for="lieu_id">Lieux :</label><br/>
                @foreach($lieux as $lieu)
                  @if($creneau->lieu_id===$lieu->id)
                    <input checked type="radio" name="lieu_id" value="{!! $lieu->id!!}"/>
                    <label for="{!! $lieu->id!!}"> {!! $lieu->nom!!} </label><br/>
                  @else
                    <input  type="radio" name="lieu_id" value="{!! $lieu->id!!}"/>
                    <label for="{!! $lieu->id!!}"> {!! $lieu->nom!!} </label><br/>
                  @endif
                @endforeach
              </div>
              <div class="col-6">
                <label for="user_id">Entraineur(s) :</label><br/>
                @foreach($users as $user)
                  @if($user->fonction_id==4)
                    @foreach($creneau->users as $entraineur)
                      @if($entraineur->id===$user->id)
                        <input checked type="checkbox" name="user_id" value="{!! $user->id!!}"/>
                        <label for="{!! $user->id!!}"> {!!$user->prenom!!} </label><br/>
                      @else
                        <input  type="checkbox" name="user_id" value="{!! $user->id!!}"/>
                        <label for="{!! $user->id!!}"> {!!$user->prenom!!} </label><br/>
                      @endif
                    @endforeach

                  @endif
                @endforeach
              </div>
            </div>


            <button type="submit" class="btn btn-primary">Modifier</button>
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
