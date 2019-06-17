@extends('layouts.app')
@section('content')
  <br/>
  <div class="container">
    <div class="row start">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header section1">Liste des sections</div>
          <div class="card-body section1">
            <table class="table">
              <thead>
              <tr>
                <th>Section</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($sections as $section)
                <tr>
                  <td class="text-primary">{!! $section->nom !!}</td>
                  <td> @if ($section->id!=1&&$section->id!=3&&$section->id!="4")	{!! Form::open(['method' => 'DELETE', 'route' => ['section.destroy', $section->id]]) !!}
                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger', 'onclick' => 'return confirm(\'Vraiment supprimer cette section ?\')']) !!}
                    {!! Form::close() !!}
                    @endif
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card">
          <div class="card-header section1">Création d'une section</div>
          <div class="card-body section1">
            <div class=" display-5">
              {!! Form::open(['route'=>'section.store','class'=>'form-horizontal']) !!}
              <div class="form-group {!! $errors->has('section') ? 'has-error' : '' !!}">
                <input type="text" name="nom" id="nom" class="form-control" placeholder= "nom">
              </div>
              {!! Form::submit('Créer', ['class' => 'btn btn-primary '])!!}
              {!! Form::close()!!}
            </div>
          </div>
        </div>
      </div>
    </div>
    <br/>
    <div class="row-back">
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
