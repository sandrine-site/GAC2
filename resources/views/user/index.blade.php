@extends('layouts.app')
@section('content')
  <br/>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Liste des administrateurs</div>
          <div class="card-body">
            <table class="table">
              <thead>
              <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Fonction</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($users as $user)

                <tr>
                  <td>{!! $user->id !!}</td>
                  <td class="text-primary">{!! $user->name !!}</td>
                  <td class="text-primary">{!! $user->prenom !!}</td>
                  <td class="text-primary">{!! $user->email !!}</td>
                  <td class="text-primary">{!! $user->telephone !!}</td>
                  <td class="text-primary">{!!\App\Fonction::find($user->fonction_id)->fonction !!}</td>

                  {{--                                <td>{!! link_to_route('user.edit', 'Modifier', $user->id, ['class' => 'btn btn-warning btn-block']) !!}</td>--}}
                  <td> 	{!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
                    {!! Form::close() !!}
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <div class="display-2">
            <div class="row">
              {!! link_to_route('user.create', 'Ajouter un utilisateur', [], ['class' => 'btn btn-primary']) !!}
              {!! $links !!}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row back">
      <a href="javascript:history.back()" class="btn-back ">
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
