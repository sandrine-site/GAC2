@extends('layouts.app')
@section('content')
    <br/>
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liste des groupes</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Catégorie</th>
                            <th>Entraineur</th>
                            <th>Section</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="medium violet">
                        @foreach($groupes as$groupe)
                            <tr>
                                <th>{{$groupe->nom}}</th>
                                <th class="small">{{$groupe->categorie}}</th>
                                @if (count ($groupe->users))
                                    <td class="text-primary">
                                        @foreach($groupe->users as $user)
                                            {{($user->prenom)}}
                                        @endforeach
                                    </td>
                                @else
                                    <td></td>
                                @endif
                                <td>{{$groupe->section->nom}}</td>
                                <td>{!! link_to_route('groupe.edit', 'Liste des gymnastes', $groupe->id, ['class' => 'btn btn-warning btn-block']) !!}</td>
                                <td>    {!! Form::open(['method' => 'DELETE', 'route' => ['groupe.destroy', $groupe->id]]) !!}
                                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce creneau ?\')']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <form method="post" action="{{route('groupe.store')}}">
                                @csrf
                                <th><input type="text" name="nom" class="form-control" placeholder='nom' value="nom"/></th>
                                <th><input type="text" name="categorie" class="form-control" placeholder='Catégorie'/>
                                </th>
                                <th>
                                    @foreach($users as $user)
                                        <input type="checkbox" name="user_id" value="{!! $user->id!!}"/>
                                        <label for="{!! $user->id!!}" class="small"> {!!$user->prenom!!} </label><br/>
                                    @endforeach</th>
                                <th>
                                    <select name="section_id" class="medium">
                                        @foreach($sections as $section)
                                            <option value='{{$section->id}}'>{{$section->nom}}</option>
                                        @endforeach
                                    </select></th>
                                <th><input type="submit" value="Nouveau groupe" class='btn btn-primary btn-block'/></th>
                                <th></th>
                            </form>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br/>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liste des gymnastes</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Section</th>
                            <th>Date naissance</th>
                            <th>Groupe</th>
                        </tr>
                        </thead>
                        <tbody class="medium rose">
                        @foreach($adherents as $adherent)
                        <form action='/adherent/{{$adherent->id}}/updateGroupe' method="post">
                            {!!csrf_field ()  !!}
                            <input type="hidden" name="_method" value="put">
                                <tr class="violet">
                                    <td>{{$adherent->nom}}</td>
                                    <td>{{$adherent->prenom}}</td>
                                    @isset($adherent->section_id)
                                        <td>{{$adherent->section->nom}}</td>
                                    @else
                                        <td></td>
                                    @endisset
                                    <td>{{strftime("%d/%m/%G", strtotime($adherent->dateNaissance))}}</td>
                                    <td>
                                        @foreach($groupes as $groupe)
                                            @if($groupe->id==$adherent->groupe_id)
                                                <label for="groupe">groupe : {!! $groupe->nom!!}  </label>
                                            @endif
                                        @endforeach
                                            <select name="groupe" id="groupe" cols="10">
                                                <option value=""></option>
                                        @foreach($groupes as $groupe)

                                                <option value="{!! $groupe->id!!}"> {!! $groupe->nom!!}</option>
                                                @endforeach
                                            </select>
                                    </td>

                                    <td><input type="submit" value="Enregistrer" class='btn btn-primary btn-block'/>


                                    </td>
                            </tr>

                            @endforeach
                            </form>


                        </tbody>

                    </table>
                    {!! $links !!}
                </div>
            </div>
            <a href="#ListeParGroupe"></a>
        </div>
    </div>
    </div>

    {{--@endforeach--}}
@endsection
