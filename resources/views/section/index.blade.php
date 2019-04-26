@extends('layouts.app')
@section('content')
    <br/>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Liste des sections</div>
                    <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Section</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sections as $section)
                            <tr>
                                <td>{!! $section->id !!}</td>
                                <td class="text-primary">{!! $section->nom !!}</td>
                                <td> 	{!! Form::open(['method' => 'DELETE', 'route' => ['section.destroy', $section->id]]) !!}
                                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cette section ?\')']) !!}
                                    {!! Form::close() !!}
                                    </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                </div>
                </div>
            </div>
        <br/>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Création d'une section</div>
                        <div class="card-body">
                            {!! Form::open(['route'=>'section.store','class'=>'form-horizontal']) !!}
                            <div class="form-group {!! $errors->has('section') ? 'has-error' : '' !!}">
                                <input type="text" name="nom" id="nom" class="form-control" placeholder= "Section">
                            </div>
                            {!! Form::submit('Créer', ['class' => 'btn btn-secondary '])!!}
                            {!! Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>

    </div>


@endsection
