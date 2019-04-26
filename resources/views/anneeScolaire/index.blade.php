@extends('layouts.app')
@section('content')
    <h1 >Changer l'année scolaire</h1>
    <div class="row justify-content-center">
    <div class="col-6">
        <div class="card">

            <div class="card-body">
                Avant de changer l'année scolaire pensez, si nécessaire, à imprimer les tables<br/><br/>
                <div class="row justify-content-center">
                    <div>
                        <a href="{!!route('anneeScolaire.create')!!}" class=" btn-large btn-success" ><span class="far fa-save"> </span> Visualiser les tables de la base de donnée </a></div>
                </div><br/>
                    Le changement d'année entrainera l'effacement des tables suivantes:
                    <ul>
                        <li> La table des adhérents</li>
                        <li> La table des groupes</li>
                        <li> La table des sections</li>
                        <li> La table des tarifs</li>
                        <li> La table des creneaux horaire</li>
                        <li> La table des payements</li>
                    </ul>
                <div class="row justify-content-center">
                    <div class="col-6">
                {!! Form::open(['route'=>'anneeScolaire.store','class'=>'form-horizontal']) !!}
                <input type="text" name="annee" id="annee" class="form-control" placeholder='Nouvelle année scolaire aaaa - aaaa+'/>
                        <button type="submit" class="btn btn-danger btn-block"><i class="fa-calendar-plus fas"> </i> Changer l'année</button></div>
                {!! Form::close()!!}
            </div>

        </div>
    </div>
    </div>
@endsection
