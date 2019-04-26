@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" >
                    <div class="card-header">Gestion des dossiers</div>
                    <div class="card-body" id="dossier">
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
{{--                            {{dd($adherents)}}--}}


                                 @foreach($adherents as $adherent)
                                <tr>
                                    @isset($adherent->dossier->id)

                                        <form action='./dossier/{{$adherent->dossier->id}}' method="post">
                            {!!csrf_field ()  !!}
                                            {{method_field ("put")}}
{{--                            <input type="hidden" name="_method" value="put">--}}
                                        <td>{{$adherent->nom}} </td>
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
                                            <td><input checked type="radio" name="recuDemande" id="recuDemandeT"
                                                       value="1">
                                                <label
                                                    class="small" for="recuDemandeT">A fournir</label><br/>
                                                <input hidden type="radio" name="recuDemande" id="payementOkF" value="0">
                                        @else
                                            <td><input type="radio" name="recuDemande" id="recuDemandeT" value="1">
                                                <label
                                                    class="small" for="recuDemandeT">A fournir</label><br/>
                                                <input hidden checked type="radio" name="payementOk" id="payementOkF"
                                                       value="0">
                                        @endif
                                        <td>@if($adherent->dossier->certifMedical==1&&$adherent->dossier->photo==1&&$adherent->dossier->autorisationsRendues==1&&$adherent->dossier->payementOk==1)  <i class="fas fa-smile "></i>
                                        @else<i class="fas fa-frown "></i>
                                        @endif</td>
                                            <td><input type="submit" class="btn btn-warning"></td>
                                        </form>
                                        @else

                                        <form action='./dossier' method="post">
                            {!!csrf_field ()  !!}
                                            <input type="hidden" name="adherent_id" value={{$adherent->id}}>
                                        <td>{{$adherent->nom}} </td>
                                        <td>{{$adherent->prenom}}</td>
                                            <td><input type="radio" name="certifMedical" id="certifMedicalT"
                                                       value="1">
                                                <label class="xx-small"
                                                       for="certifMedicalT"> ok </label><br/>
                                                <input type="radio" name="certifMedical" id="certifMedicalF" value="0">
                                                <label
                                                    class="xx-small" for="certifMedicalF">pas ok</label><br/></td>

                                            <td><input  type="radio" name="photo" id="photoT" value="1"> <label
                                                    class="xx-small" for="photoT"> ok </label><br/>
                                                <input type="radio" name="photo" id="photoF" value="0"> <label
                                                    class="xx-small" for="photoF">pas ok</label><br/></td>

                                            <td><input  type="radio" name="autorisationsRendues"
                                                       id="autorisationsRenduesT" value="1"> <label
                                                    class="xx-small" for="autorisationsRenduesT"> ok </label><br/>
                                                <input type="radio" name="autorisationsRendues"
                                                       id="autorisationsRenduesF" value="0"> <label
                                                    class="xx-small" for="autorisationsRenduesF">pas ok</label><br/>
                                            </td>
                                            <td><input type="radio" name="payementOk" id="payementOkT"
                                                       value="1">
                                                <label class="xx-small"
                                                       for="payementOkT"> ok </label><br/>
                                                <input type="radio" name="payementOk" id="payementOkF" value="0">
                                                <label
                                                    class="xx-small" for="payementOkF">pas ok</label><br/></td>

                                            <td><input  type="radio" name="recuDemande" id="recuDemandeT"
                                                       value="1">
                                                <label
                                                    class="small" for="recuDemandeT">A fournir</label><br/>
                                      <td> <i class="fas fa-frown"></i>
                                       </td>
                                            <td><input type="submit" class="btn btn-warning"></td>
                                        </form>
                                        @endisset
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


{{--    {!! $adherents->links()  !!}--}}
@endsection

