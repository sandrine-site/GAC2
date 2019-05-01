@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des adhérents</h1>
        <table class="liste">
            <tbody>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Groupe</th>
                <th>Né le</th>
                <th>Tel adhérent</th>
                <th>Emails:</th>
                <th>Ville</th>

                <th>
                <th><i class="fas fa-child large"></th>
                <th><i class="fas fa-video large"></i></th>
                <th><i class="fas fa-car"></i></th>
                </th>
                <th><i class="fas fa-laptop-medical "></i></th>
                <th>
                    Editer
                </th>
            </tr>
            </tbody>
            <tbody>
            @foreach($adherents as $adherent)
                <tr>
                    <td>{{$adherent->nom}}</td>
                    <td>{{$adherent->prenom}}</td>
                    <td>@isset($adherent->groupe){{$adherent->groupe->nom}}
                        @else{{$adherent->section->nom}}
                        @endisset</td>
                    <td> {{ date_parse($adherent->dateNaissance)['year']}}</td>
                    <td> @foreach($adherent->telephones as $telephone)
                            @if($telephone->typeTel_id==1)
                                <span><em>Adherent:</em>{{$telephone->numero}}</span><br/>
                            @elseif($telephone->typeTel_id==2)
                                <span><em>Resp Légal 1:</em>{{$telephone->numero}}</span><br/>
                            @elseif($telephone->typeTel_id==3)
                                <span><em>Resp Légal 2:</em>{{$telephone->numero}}</span>
                            @endif
                        @endforeach
                    </td>
                    <td>{{$adherent->email1}}<br/>
                        @if (isset($adherent->email2)&&$adherent->email2!='null'){{$adherent->email2}}
                        @endif</td>
                    <td>{{$adherent->ville}}</td>

                    {{--@foreach(\App\Autorisation::where('adherent_id',$adherent->id)->get() as $autorisation)--}}
                    {{--   <td>{{dd(\App\Autorisation::typeAutorisation($autorisation))}}--}}

                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> @foreach($adherent->telephones as $telephone)
                            @if($telephone->typeTel_id==4)
                                <span>
                                    {{$telephone->numero}}</span>
                    @endif
                    @endforeach
                   <td>
<a class="btn btn-primary btn" href={!!route('accueilAdmin.index')!!}><i class="fas fa-edit"></i>
                                    </a></td>
                    {{--  @endforeach--}}
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
          {!! $adherents->links()  !!}
@endsection
