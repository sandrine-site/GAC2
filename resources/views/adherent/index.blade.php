@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1 >Liste des adherents</h1>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Section</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($adherents as $adherent)
                                <tr>
                                    <td>{!! $adherent->id !!}</td>
                                    <td class="text-primary">{!! $adherent->nom !!}</td>
                                    <td class="text-primary">{!! $adherent->prenom !!}</td>
                                    <td class="text-primary">{!! $adherent->email1 !!}
                                    {!! $adherent->email2 !!}</td>
                                    @foreach($adherent->telephones as $telephone)

                        <td class="text-primary">{{$telephone->telephone_Resp1}} </td>

                                   @endforeach
                                    <td class="text-primary">{!! $adherent->section !!}</td>

                        <td>{!! link_to_route('adherent.edit', 'Modifier', $adherent->id, ['class' => 'btn btn-warning btn-small']) !!}</td>

                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
        </div>
</div>
<div class="display-2">
<div class="row">
            </div>
        </div>


@endsection
