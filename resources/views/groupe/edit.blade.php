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
                        <tbody class="small violet">
                        @foreach($groupes as $groupe)
                            <tr>
                                <th>{{$groupe->nom}}</th>
                                <th >{{$groupe->categorie}}</th>
                                @if (count ($groupe->users))
                                    <td >
                                        @foreach($groupe->users as $user)
                                            {{($user->prenom)}}
                                        @endforeach
                                    </td>
                                @else
                                    <td></td>
                                @endif
                                <td>{{$groupe->section->nom}}</td>
                                <td>{!! link_to_route('groupe.edit', 'Liste des gymnastes', $groupe->id, ['class' => 'btn btn-primary btn-block']) !!}</td>
                                <td>{!! link_to_route('groupe.edit', 'Modifier', $groupe->id, ['class' => 'btn btn-warning btn-block']) !!}</td>
                                <td> {!! Form::open(['method' => 'DELETE', 'route' => ['groupe.destroy', $groupe->id]]) !!}
                                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce creneau ?\')']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <form method="post" action="{{route('groupe.store')}}">
                                {!!csrf_field ()  !!}

                                <th><input type="text" name="nom" class="form-control" placeholder='nom' value="nom"/>
                                </th>
                                <th><input type="text" name="categorie" class="form-control" placeholder='Catégorie'/>
                                </th>
                                <th>
                                    @foreach($users as $user)
                                        <input type="checkbox" name="user_id" value="{!! $user->id!!}"/>
                                        <label for="{!! $user->id!!}" class="small"> {!!$user->prenom!!} </label><br/>
                                    @endforeach</th>
                                <th>
                                    <select name="section_id" class="medium">
                                        <option value="">choisir</option>
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
                     <table>
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date naissance</th>
                                <th >Groupe</th>
                            </tr>
                            </thead>
                            <tbody class="medium violet">

                            @foreach($sections as $section)
                                <th class="b-rose">Section: {{$section->nom}}</th>
                                @foreach($section->adherents->where('groupe_id','<>',NULL) as $adherent)

                                    <form action='./groupe/updateAdherent' method="post">
                        {!!csrf_field ()  !!}
                        {{method_field ("put")}}
 <tr>
                                        <td>{{$adherent->nom}} <input type="hidden" name="adherent" value="{{$adherent->id}}"></td>
                                        <td>{{$adherent->prenom}}</td>
                                        <td>{{strftime("%d/%m/%G", strtotime($adherent->dateNaissance))}}</td>
                                        <td class="align-end">
                                      {{$adherent->groupe->nom}}  <select name="groupe" id="groupe" cols="10">
                                            <option value="">choisir dans la liste</option>
                                            @foreach($groupes as $groupe)
                                                <option value="{!!$groupe->id!!}"> {!! $groupe->nom!!}</option>
                                            @endforeach
                                        </select>
                                        </td>
                                        <td> <input type="submit" value="Enregistrer" class='btn btn-vert2 btn-block'/></td>
                                    </form>
                                    @endforeach
                                 @foreach($section->adherents->where('groupe_id','=',NULL) as $adherent)

                                    <form action='./groupe/updateAdherent' method="post">
                        {!!csrf_field ()  !!}
                        {{method_field ("put")}}
 <tr>
                                        <td>{{$adherent->nom}} <input type="hidden" name="adherent" value="{{$adherent->id}}"></td>
                                        <td>{{$adherent->prenom}}</td>
                                        <td>{{strftime("%d/%m/%G", strtotime($adherent->dateNaissance))}}</td>
                                        <td class="align-end">
                                          <select name="groupe" id="groupe" cols="10">
                                            <option value="">choisir dans la liste</option>
                                            @foreach($groupes as $groupe)
                                                <option value="{!!$groupe->id!!}"> {!! $groupe->nom!!}</option>
                                            @endforeach
                                        </select></span>
                                        </td>
                                        <td> <input type="submit" value="Enregistrer" class='btn btn-vert2 btn-block'/></td>
                                    </form>
     @endforeach </tr>
                            @endforeach


                            </tbody>

                        </table>



                </div>
            </div>
            <a href="#ListeParGroupe"></a>
        </div>
    </div>
    </div>
    {{--@endforeach--}}
@endsection
