@extends('layouts.app')
@section('content')
  <br/>
  <div class="container groupe">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header section1">Liste des groupes</div>
        <div class="card-body section1">
          <table>
            <thead>
            <tr>
              <th>Nom</th>
              <th>Catégorie</th>
              <th>Entraineur</th>
              <th>Section</th>
              <th></th>
            </tr>
            </thead>
            <tbody class="small violet">
            @foreach($groupes as $groupe)
              <tr>
                <th>{{$groupe->nom}}</th>
                <th >{{$groupe->categorie}}</th>
                @isset($groupe->users)
                  <td >
                    @foreach($groupe->users as $user)
                      {{($user->prenom)}}
                    @endforeach
                  </td>
                @else
                  <td></td>
                @endisset
                <td>{{$groupe->section->nom}}</td>
                <td>{!! link_to_route('groupe.edit', 'Modifier', $groupe->id, ['class' => 'btn btn-warning']) !!}</td>
                <td> {!! Form::open(['method' => 'DELETE', 'route' => ['groupe.destroy', $groupe->id]]) !!}
                  {!! Form::submit('Supprimer', ['class' => 'btn btn-danger', 'onclick' => 'return confirm(\'Vraiment supprimer ce creneau ?\')']) !!}
                  {!! Form::close() !!}
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-body section1">
          <table>
            <tbody>
            <tr>
              Creer un nouveau groupe
            </tr>
            <tr>
              <form method="post" action="{{route('groupe.store')}}">
                {!!csrf_field ()  !!}
                <td><input type="text" name="nom" class="form-control" placeholder='nom' value="nom"/>
                </td>
                <td><input type="text" name="categorie" class="form-control" placeholder='Catégorie'/>
                </td>
                <td>
                  @foreach($users as $user)
                    <input type="checkbox" name="user_id" value="{!! $user->id!!}"/>
                    <label for="{!! $user->id!!}" class="small"> {!!$user->prenom!!} </label><br/>
                  @endforeach</td>
                <td>
                  <select name="section_id" class="medium">
                    <option value="">choisir</option>
                    @foreach($sections as $section)

                      <option value='{{$section->id}}'>{{$section->nom}}</option>
                    @endforeach
                  </select></td>
                <td><input type="submit" value="Nouveau groupe" class='btn btn-primary btn-block'/></td>
                <td></td>
              </form>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row back">

        <a href="javascript:history.back()" class="btn-back ">
          <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>

      </div>
    </div>

@endsection
