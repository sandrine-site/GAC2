@extends('layouts.app')
@section('content')
    <br/>
    <div class="container">
        <div class="col-md-12">

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
                                <th>Nb d'heure par semaine/Rq</th>
                                <th>Section</th>
                                <th>Groupe</th>
                                <th>Horaires</th>
                            </tr>
                            </thead>
                            <tbody class="small violet">
                            @foreach($sections as $section)
                                <tr>
                                    <th class="b-rose">Section: {{$section->nom}}</th>
                                </tr>
                                <form action='./Adherent/updateRepartition' methode="post" name="repartition">
                                    {!!csrf_field ()  !!}
                                    {{method_field ("put")}}
                                    @foreach($groupes as $groupe)
                                        @if($groupe->section_id==$section->id)
                                            @foreach($section->adherents as $adherent)
                                                <tr>
                                                    <td>{{$adherent->nom}}</td>
                                                    <td>{{$adherent->prenom}}</td>
                                                    <td>{{(strftime("%d/%m/%G", strtotime($adherent->dateNaissance)))}}</td>
                                                    <td>{{$adherent->heureSemaine}}
                                                        @if ($adherent->remarques!=null)
                                                            @foreach ($adherent->remarques as $rq)
                                                                @if($rq->typeRq_id==1)<br/>S{{$rq->remarque}}
                                                                @endif
                                                            @endforeach
                                                        @endif

                                                    </td>
                                                    <td><select name="getsection" id="section"
                                                                onChange="getsection(this)">
                                                            @isset($adherent->section)
                                                                <option
                                                                    value="{{$adherent->section->id}}">{{$adherent->section->nom}}</option>
                                                            @else
                                                                <option value="">Choisir dans la liste</option>
                                                            @endisset
                                                            @foreach($sections as $section)
                                                                <option
                                                                    value="{!!$section->id!!}"> {!! $section->nom!!}</option>

                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="groupe" id="groupe">
                                                            @isset($adherent->groupe)
                                                                <option
                                                                    value="{{$adherent->groupe->id}}">{{$adherent->groupe->nom}}</option>
                                                            @else
                                                                <option value="">Choisir dans la liste
                                                                </option>
                                                            @endisset
                                                            @foreach($groupes as $groupe)
                                                                <option
                                                                    value="{!!$groupe->id!!}"> {!! $groupe->nom!!}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        @if ($adherent->creneau!=null)

                                                            @foreach($adherent->creneau as $horaires)
                                                                {{$horaires->jour}} à {{$horaires->heure_debut}}
                                                                h{{$horaires->min_debut}} pendant {{$horaires->duree}}
                                                            @endforeach
                                                        @endif
                                                        <select name="creneaux[]" id="creneaux">
                                                            <option value="">Ajouter un creneaux
                                                            </option>

                                                            @foreach($creneaux as $horaires)

                                                                <option
                                                                    value="{!!$horaires->id!!}"> {{$horaires->heure_debut}}
                                                                    h{{$horaires->min_debut}}
                                                                    pendant {{$horaires->duree}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                </tr>


                                            @endforeach
                                        @endif
                                </form>
                                @endforeach


                                @endforeach


                                {{--<br/>--}}
                                {{--SSSSSSSSSSSSS--}}
                                {{--<br/>--}}


                                {{--                            @foreach($sections as $section)--}}
                                {{--                                <th class="b-rose">Section: {{$section->nom}}</th>--}}
                                {{--                                @foreach($section->adherents->where('groupe_id','!=',NULL) as $adherent)--}}
                                {{--                                    <form action='./Adherent/updateRepartition'  methode="post" name="repartition">--}}
                                {{--                                        {!!csrf_field ()  !!}--}}
                                {{--                                        {{method_field ("put")}}--}}
                                {{--                                        <tr>--}}
                                {{--                                            <td>{{$adherent->nom}} <input type="hidden" name="adherent" value="{{$adherent->id}}"></td>--}}

                                {{--                                @foreach($section->adherents->where('groupe_id','==',NULL) as $adherent)--}}
                                {{--                                    <tr>--}}
                                {{--                                    <td>{{$adherent->nom}} <input type="hidden" name="adherent" value="{{$adherent->id}}"></td>--}}
                                {{--                                    <td>{{$adherent->prenom}}</td>--}}
                                {{--                                    <td>{{strftime("%d/%m/%G", strtotime($adherent->dateNaissance))}}</td>--}}
                                {{--                                    <td class="align-end">--}}
                                {{--                                        <select name="groupe" id="groupe" cols="10">--}}
                                {{--                                            <option value="">choisir dans la liste</option>--}}
                                {{--                                            @foreach($groupes as $groupe)--}}
                                {{--                                                <option value="{!!$groupe->id!!}"> {!! $groupe->nom!!}</option>--}}
                                {{--                                            @endforeach--}}
                                {{--                                        </select>--}}
                                {{--                                    </td>--}}

                                {{--                                @endforeach--}}
                                {{--                            @endforeach--}}
                                {{--                                    </tr>--}}
                                {{--                                    <tr>                                           <td><input type="submit" value="Enregistrer" class='btn btn-vert2 btn-block'/></td>--}}
                                {{--                                            </tr>--}}
                                </form>
                            </tbody>

                        </table>


                    </div>
                </div>
                <a href="#ListeParGroupe"></a>
            </div>
        </div>
    </div>
    {{--@endforeach--}}

    <script type="text/javascript">

    </script>
@endsection
