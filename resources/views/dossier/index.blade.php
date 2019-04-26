@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Gestion des dossiers</div>
                    <div class="card-body">
                        <table>
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Certif médical</th>
                                <th>Photo</th>
                                <th>Autorisations</th>
                                <th>Payement</th>
                                <th>Attestation</th>
                                <th>Dossier Complet</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($adherents as $adherent)
                                <tr>
                                    @isset($adherent->dossier)
                                        {!! Form::open(['route' =>'dossier.create','method' => 'put']) !!}
                                        <td>{{$adherent->nom}}{{$adherent->dossier->id}} </td>
                                        <td>{{$adherent->prenom}}</td>
                                        @if($adherent->dossier->certifMedical===1)
                                            <td><input checked type="radio" name="certifMedical" id="certifMedicalT"
                                                       value="1">
                                                <label class="xx-small"
                                                       for="certifMedicalT"> ok </label><br/>
                                                <input type="radio" name="certifMedical" id="certifMedicalF" value="0">
                                                <label
                                                    class="xx-small" for="certifMedicalF">pas ok</label><br/></td>
                                        @else
                                            <td><input type="radio" name="certifMedical" id="certifMedicalT" value="1">
                                                <label
                                                    class="xx-small" for="certifMedicalT"> ok </label><br/>
                                                <input checked type="radio" name="certifMedical" id="certifMedicalF"
                                                       value="0">
                                                <label class="xx-small"
                                                       for="certifMedicalF">pas ok</label><br/></td>
                                        @endif

                                        @if($adherent->dossier->photo===1)
                                            <td><input checked type="radio" name="photo" id="photoT" value="1"> <label
                                                    class="xx-small" for="photoT"> ok </label><br/>
                                                <input type="radio" name="photo" id="photoF" value="0"> <label
                                                    class="xx-small" for="photoF">pas ok</label><br/></td>
                                        @else
                                            <td><input type="radio" name="photo" id="photoT" value="1"> <label
                                                    class="xx-small" for="photoT"> ok </label><br/>
                                                <input checked type="radio" name="photo" id="photoF" value="0"> <label
                                                    class="xx-small" for="photoF">pas ok</label><br/></td>
                                        @endif

                                        @if($adherent->dossier->autorisationsRendues===1)
                                            <td><input checked type="radio" name="autorisationsRendues"
                                                       id="autorisationsRenduesT" value="1"> <label
                                                    class="xx-small" for="autorisationsRenduesT"> ok </label><br/>
                                                <input type="radio" name="autorisationsRendues"
                                                       id="autorisationsRenduesF" value="0"> <label
                                                    class="xx-small" for="autorisationsRenduesF">pas ok</label><br/>
                                            </td>
                                        @else
                                            <td><input type="radio" name="autorisationsRendues"
                                                       id="autorisationsRenduesT" value="1"> <label
                                                    class="xx-small" for="autorisationsRenduesT"> ok </label><br/>
                                                <input checked type="radio" name="autorisationsRendues"
                                                       id="autorisationsRenduesF" value="0"> <label
                                                    class="xx-small" for="autorisationsRenduesF">pas ok</label><br/>
                                            </td>
                                        @endif
                                        @if($adherent->dossier->payementOk===1)
                                            <td><input checked type="radio" name="payementOk" id="payementOkT"
                                                       value="1">
                                                <label class="xx-small"
                                                       for="payementOkT"> ok </label><br/>
                                                <input type="radio" name="payementOk" id="payementOkF" value="0">
                                                <label
                                                    class="xx-small" for="payementOkF">pas ok</label><br/></td>
                                        @else
                                            <td><input type="radio" name="payementOk" id="payementOkT"
                                                       value="1">
                                                <label class="xx-small"
                                                       for="payementOkT"> ok </label><br/>
                                                <input checked type="radio" name="payementOk" id="payementOkF"
                                                       value="0">
                                                <label
                                                    class="xx-small" for="payementOkF">pas ok</label><br/></td>
                                        @endif
                                        @if($adherent->dossier->recuDemande===1)
                                            <td><input checked type="radio" name="recuDemandeOk" id="recuDemandeT"
                                                       value="1">
                                                <label
                                                    class="small" for="recuDemandeT">A fournir</label><br/>
                                                <input hidden type="radio" name="payementOk" id="payementOkF" value="0">
                                                <label
                                                    class="small" for="payementOkF"></label><br/></td>
                                        @else
                                            <td><input type="radio" name="recuDemandeOk" id="recuDemandeT" value="1">
                                                <label
                                                    class="small" for="recuDemandeT">A fournir</label><br/>
                                                <input hidden checked type="radio" name="payementOk" id="payementOkF"
                                                       value="0">
                                                <label
                                                    class="small" for="payementOkF"></label><br/></td>
                                        @endif
                                        <td></td>
                                        <td>{!! Form::submit('Valider', ['class' => "btn btn-warning"]) !!}
                                            {!! Form::close() !!}</td>
{{--                                        @else(isset)--}}
                                    @endisset
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


    {!! $adherents->links()  !!}
@endsection

