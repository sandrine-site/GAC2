@extends('accueilAdmin')

@section('content')
    <div class="row display-card">

        Editer un Gymnaste
        <div class="small">Choisir dans la liste</div>
    </div>
    <form action='./editAccueil' method="post">
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

@endsection
