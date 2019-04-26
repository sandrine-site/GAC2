@extends('layouts.app')
@section('content')
    <br/>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Création d'un administrateur</div>
                    <div class="card-body">
                        <form method="post" action="{{ route ('user.store') }}" class='form-horizontal'>
                            @csrf
                   <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                       <input type="text" name="name" id="name" class="form-control" placeholder= "Nom"
                                                                                                    value="{{old("name","")}}"/>
                       @if ($errors->has('name'))  <small class="help-block">{{$errors->first('name',':message') }}</small>  @endif
                   </div>
                   <div class="form-group {!! $errors->has('prenom') ? 'has-error' : '' !!}">
                       <input type="text" name="prenom" id="prenom" class="form-control" placeholder='Prenom'
                       value="{{old("prenom","")}}" />
                       @if ($errors->has('prenom')) <small class="help-block">{!! $errors->first('prenom',
                       ':message') !!}</small> @endif
                   </div>
                   <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">

                       <input type="email" name="email" id="email" class="form-control" placeholder='E-mail'
                              value="{{old ("email","")}}" />
                       @if ($errors->has('email')) <small class="help-block">{{$errors->first('email', ':message')}}</small>@endif
                   </div>
                   <div class="form-group {!! $errors->has('telephone') ? 'has-error' : '' !!}">
                       <input type="text" name="telephone" id="telephone" class="form-control" placeholder='Téléphone'
                              value="{{old("telephone","")}}" />
                       @if ($errors->has('telephone')) <small class="help-block">{{$errors->first('telephone',
                       ':message')}}</small> @endif
                   </div>
                        <div class="form-group {!! $errors->has('fonction_id') ? 'has-error' : '' !!}">
                            <p>Fonction:<p>
                                <select name="fonction_id" id="fonction_id" >
                        @foreach($fonctions as $fonction )
                                        <option value="{{$fonction->id}}"> {!! $fonction->fonction !!} </option>
                       @endforeach
                       </select>
                   </div>
                   <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
                       <input type="password" class='form-control' name="password" placeholder='Mot de passe'/>
                       <small class="help-block">{!! $errors->first('password', ':message') !!}</small>
                   </div>
                   <div class="form-group">
                       <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                              value="{{ old('password_confirmation') }}" placeholder='Confirmation du mot de passe'required>
                       <small class="help-block">{!! $errors->first('password', ':message') !!}</small>
                   </div>

                    <input type="submit" value="Envoyer" class='btn btn-secondary'/>
                        </form>
               </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div><a href="javascript:history.back()" class="btn btn-primary ">
                    <span class="fa fa-arrow-circle-left"></span> Retour
                </a></div>
        </div>

@endsection

