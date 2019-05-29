@extends('layouts.app')
@section('content')
  <br/>
  <div class="container">
  <div class="row">
    <div class="col-md-6">
        <div class="card">
          <div class="card-header">Liste des sections</div>
          <div class="card-body">
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
                    <td> 	{!! Form::open(['method' => 'DELETE', 'route' => ['section.destroy', $section->id]]) !!}
                      {!! Form::submit('Supprimer', ['class' => 'btn btn-danger', 'onclick' => 'return confirm(\'Vraiment supprimer cette section ?\')']) !!}
                      {!! Form::close() !!}
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
                        <div class="card-header">Création d'une section</div>
                        <div class="card-body">
                        <div class=" display-5">
                            {!! Form::open(['route'=>'section.store','class'=>'form-horizontal']) !!}
                            <div class="form-group {!! $errors->has('section') ? 'has-error' : '' !!}">
                                <input type="text" name="nom" id="nom" class="form-control" placeholder= "nom">
                            </div>
                            {!! Form::submit('Créer', ['class' => 'btn btn-secondary '])!!}
                            {!! Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
  </div>
  <br/>
  <a href="javascript:history.back()" class="btn-back">
          <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>


@endsection
