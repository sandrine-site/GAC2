@endsection


@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> Dossier de {{$adherent->nom}}   {{$adherent->prenom}}</div>
                    <div class="card-body">
                        <table>
                            <thead>
{{--                             <form action='/dossier/{{$adherent->dossier->id}}/' method="post">--}}
{{--                            {!!csrf_field ()  !!}--}}
                            <input type="hidden" name="_method" value="put">

                            <tr>
                                <th>Certif médical</th>
                                <th>Photo</th>
                                <th>Autorisations</th>
                                <th>Payement</th>
                                <th>Attestation</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                @if($dossier->certifMedical===1)
                                    <td><input checked type="radio" name="certifMedical" id="certifMedicalT" value="1">
                                        <label class="small"
                                            for="certifMedicalT"> ok </label><br/>
                                        <input type="radio" name="certifMedical" id="certifMedicalF" value="0"> <label
                                            class="small"  for="certifMedicalF">pas ok</label><br/></td>
                                @else
                                    <td><input type="radio" name="certifMedical" id="certifMedicalT" value="1"> <label
                                            class="small"  for="certifMedicalT"> rendu </label><br/>
                                        <input checked type="radio" name="certifMedical" id="certifMedicalF" value="0">
                                        <label class="small"
                                            for="certifMedicalF">non-rendu</label><br/></td>
                                @endif
                                @if($dossier->photo===1)
                                    <td><input checked type="radio" name="photo" id="photoT" value="1"> <label
                                            class="small"  for="photoT"> ok </label><br/>
                                        <input type="radio" name="photo" id="photoF" value="0"> <label
                                            class="small" for="photoF">pas ok</label><br/></td>
                                @else
                                    <td><input type="radio" name="photo" id="photoT" value="1"> <label
                                            class="small"   for="photoT"> ok </label><br/>
                                        <input checked type="radio" name="photo" id="photoF" value="0"> <label
                                            class="small"  for="photoF">pas ok</label><br/></td>
                                @endif
                                @if($dossier->autorisationsRendues===1)
                                    <td><input checked type="radio" name="autorisationsRendues"
                                               id="autorisationsRenduesT" value="1"> <label
                                            class="small"  for="autorisationsRenduesT">ok </label><br/>
                                        <input type="radio" name="autorisationsRendues" id="autorisationsRenduesF"
                                               value="0"> <label
                                            class="small" for="autorisationsRenduesF">pas ok</label><br/></td>
                                @else
                                    <td><input type="radio" name="autorisationsRendues" id="autorisationsRenduesT"
                                               value="1"> <label
                                            class="small" for="autorisationsRenduesT"> ok </label><br/>
                                        <input checked type="radio" name="autorisationsRendues"
                                               id="autorisationsRenduesF" value="0"> <label
                                            class="small"  for="autorisationsRenduesF">ok</label><br/></td>
                                @endif
                                @if($dossier->payementOk===1)
                                    <td><input checked type="radio" name="payementOk" id="payementOkT" value="1"> <label
                                            class="small"  for="payementOkT">ok</label><br/>
                                        <input type="radio" name="payementOk" id="payementOkF" value="0"> <label
                                            class="small" for="payementOkF">pas ok</label><br/></td>
                                @else
                                    <td><input type="radio" name="autorisationsRendues" id="autorisationsRenduesT"
                                               value="1"> <label
                                            class="small" for="autorisationsRenduesT">ok</label><br/>
                                        <input checked type="radio" name="autorisationsRendues"
                                               id="autorisationsRenduesF" value="0"> <label
                                            class="small" for="autorisationsRenduesF">pas ok</label><br/></td>
                                @endif
                                @if($dossier->recuDemande===1)
                                    <td><input checked type="radio" name="recuDemandeOk" id="recuDemandeT" value="1">
                                        <label
                                            class="small"   for="recuDemandeT">A fournir</label><br/>
                                        <input hidden type="radio" name="payementOk" id="payementOkF" value="0"> <label
                                            class="small"  for="payementOkF"></label><br/></td>
                                @else
                                    <td><input type="radio" name="recuDemandeOk" id="recuDemandeT" value="1"> <label
                                            class="small"    for="recuDemandeT">A fournir</label><br/>
                                        <input hidden checked type="radio" name="payementOk" id="payementOkF" value="0">
                                        <label
                                            class="small" for="payementOkF"></label><br/></td>
                                @endif

                                    <td>{!! link_to_route('dossier.update', 'Modifier', $dossier->id, ['class' => 'btn btn-warning '])  !!}</td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    {{--    {!! $links !!}--}}
