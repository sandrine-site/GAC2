@extends('layouts.app')
@section('content')
    <br/>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Modification d'un administrateur</div>
                    <div class="card-body">
                   {!! Form::model($user, ['route'=>['user.update',$user->id],'method'=>'put','class'=>'form-horizontal']) !!}
                   <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                   <input type="text" name="name" id="name" class="form-control" placeholder= "{{$user->name}}"
                          value="{{$user->name}}"/>
                   @if ($errors->has('name'))  <small class="help-block">{{$errors->first('name',':message') }}</small>@endif
                   </div>
                <div class="form-group {!! $errors->has('prenom') ? 'has-error' : '' !!}">
                <input type="text" name="prenom" id="prenom" class="form-control" placeholder='Prénom'
                       value="{{old ($user->prenom,'')}}">
                @if ($errors->has('prenom')) <small class="help-block">{!! $errors->first('prenom',':message') !!}</small> @endif
            </div>
                <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                    <input type="email" name="email" id="email" class="form-control" placeholder='E-mail'
                           value="{{$user->email,
                "Email"}}" />
                    @if ($errors->has('email')) <small class="help-block">{{$errors->first('email', ':message')}}</small>@endif
                </div>
                <div class="form-group {!! $errors->has('telephone') ? 'has-error' : '' !!}">
                            <input type="text" name="telephone" id="telephone" class="form-control" placeholder='Téléphone'
                                   value="{{$user->telephone,
                "Téléphone"}}" />
                            @if ($errors->has('telephone')) <small class="help-block">{{$errors->first('telephone',
                       ':message')}}</small> @endif
                        </div>


                {!! Form::submit('Envoyer', ['class' => 'btn btn-secondary']) !!}

                {!! Form::close() !!}
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

