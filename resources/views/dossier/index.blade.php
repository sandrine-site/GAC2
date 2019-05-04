@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" >
                    <div class="card-header">Gestion des dossiers</div>
                    <div class="card-body" id="dossier">
                          <form action='./adherent/update' method="get">
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
                                    </td>
                                     <td>
                                        {{$adherent->prenom}}
                                    </td>
                                    <td>
                                        @if($adherent->CertifMedical==1)
                                   <i class="fas fa-check-circle Vert2"></i>
                                    @else
                                     <input type="checkbox" name="CertifMedical[]" value="{{$adherent->CertifMedical}}{{$adherent->id}}" >
                                    @endif</td>
                                    <td>
                                        @if($adherent->photo==1)
                                   <i class="fas fa-check-circle Vert2"></i>
                                    @else
                                     <input type="checkbox" name="photo[]" value="{{$adherent->photo}}{{$adherent->id}}" >
                                    @endif</td>
                                     <td>
                                        @if($adherent->autorisationsRendues==1)
                                   <i class="fas fa-check-circle Vert2"></i>
                                    @else
                                     <input type="checkbox" name="autorisationsRendues[]" value="{{$adherent->autorisationsRendues}}{{$adherent->id}}" >
                                    @endif</td>
                                     <td>
                                        @if($adherent->RecuDemande==1)
                                   <i class="fas fa-flag Jaune"></i>
                                    @else
                                     <input type="checkbox" name="RecuDemande[]" value="{{$adherent->RecuDemande}}{{$adherent->id}}" >
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


@endsection
