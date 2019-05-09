@extends('layouts.app')
@section('content')
    <div class="container">
        <div id="app">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card" >
                        <div class="card-header">Gestion des dossiers</div>
                        <div class="card-body" id="dossier">
                            <form action='./adherent/updateDocument' method="get">
                                {!!csrf_field ()  !!}
                                <table class="dossier">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Certificat<br/> médical</th>
                                        <th>Photo</th>
                                        <th>Autorisations<br/>papiers</th>
                                        <th>Attestation<br/> demandée</th>
                                        <th>Dossier Complet</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($adherents as $adherent)

                                        <tr>
                                            <td>
                                                {{$adherent->nom}}
                                                <input type="hidden" value="{{$adherent->id}}" name="adherent">
                                            </td>
                                            <td>
                                                {{$adherent->prenom}}
                                            </td>
                                            <td>
                                                @if($adherent->CertifMedical==1)
                                                    <input type="checkbox" checked  name="CertifMedicalF"
                                                           value="{{$adherent->id}}">
                                                @else
                                                    <input type="checkbox" name="CertifMedicalT" value="{{$adherent->id}}">
                                                @endif</td>
                                            <td>
                                                @if($adherent->photo==1)
                                                    <input type="checkbox"
                                                           onclick="POSTS_MANAGER.onclickPhoto({{ $adherent->id }}) "checked name="photoF"
                                                           id="photoF" class="btn-vert2 medium"  value="{{$adherent->id}}">
                                                @else
                                                    <input type="checkbox"  name="photoT"
                                                           id="photoT" onclick="POSTS_MANAGER.onclickPhoto({{ $adherent->id }})" value="{{$adherent->id}}" >
                                                @endif</td>

                                            <td>
                                                @if($adherent->autorisationsRendues==1)
                                                    <input type="checkbox" checked name="autorisationsRenduesF"
                                                           value="{{$adherent->id}}">
                                                @else
                                                    <input type="checkbox" name="autorisationsRenduesT" value="{{$adherent->id}}" >
                                                @endif</td>
                                            <td>
                                                @if($adherent->RecuDemande==1)
                                                    <input type="checkbox" cheched name="RecuDemandeF" value="{{$adherent->id}}">
                                                @else
                                                    <input type="checkbox" name="RecuDemandeT" value="{{$adherent->id}}" >
                                                @endif</td>
                                            <td>
                                                @if($adherent->autorisationsRendues==1&&$adherent->photo==1&&$adherent->CertifMedical==1)
                                                    <i class="fas fa-smile Vert2 large "></i>
                                                @endif</td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary btn pull-right">Enregistrer
                                    les modifications
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>{!! $adherents->links()  !!}
        </div>
    </div>

