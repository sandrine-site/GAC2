@extends('layouts.app')
@section('content')
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="card" >
        <div class="card-header section5">Envoyer un SMS</div>
        <div class="card-body section5" >
          <p> Pour envoyer un SMS groupé faites un copié-collé de ces listes dans votre téléphone
              (pour ne pas saturer votre boîte d'envois 1 liste par SMS)</p>
          @if( $liste1!=[])
            <h4 class="fonce"> Pour les adhérents:</h4>
            @for($i=0;$i<=$divL1;$i++)
              <p>liste n° {{$i+1}} :<br/>
                @for($j=0+$i;$j<=10+$i;$j++) {{$liste1[$j]}}, @endfor</p>
            @endfor
            <p>liste n°{{$divL1+2}}</p>
            @for($j=0+($divL1+1);$j<=$resteL1+($divL1+1);$j++) {{$liste1[$j]}}, @endfor</p>
            @endif
            @if( $liste2!=[])
              <h4 class="fonce">  Pour les résponsables légaux 1:</h4>
              @for($i=0;$i<=$divL2;$i++)
                <p>liste n° {{$i+1}} :<br/>
                  @for($j=0+$i;$j<=10+$i;$j++) {{$liste2[$j]}}, @endfor</p>
              @endfor
              <p>liste n°{{$divL2+2}}</p>
              @for($j=0+($divL2+1);$j<=$resteL2+($divL2+1);$j++) {{$liste2[$j]}}, @endfor</p>
              @endif
              @if( $liste3!=[])
                <h4 class="fonce"> Pour les résponsables légaux 2:</h4>
                @for($i=0;$i<=$divL3;$i++)
                  <p>liste n° {{$i+1}} :<br/>
                    @for($j=0+$i;$j<=10+$i;$j++) {{$liste3[$j]}}, @endfor</p>
                @endfor
                <p>liste n°{{$divL3+2}}</p>
                @for($j=0+($divL3+1);$j<=$resteL3+($divL3+1);$j++) {{$liste3[$j]}}, @endfor</p>
                @endif

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


@endsection


