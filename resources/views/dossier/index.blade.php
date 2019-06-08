@extends('layouts.app')
@section('content')
  <div class="row justify-content-center">
    <div class="col-8">
      <div class="card" >
        <div class="card-header section6">Gestion des dossiers</div>
        <div class="card-body section6" id="dossier">
          <form
            id="app"
            action='./dossier/update'
            method="post" >
            {!!csrf_field ()  !!}
            {{method_field ("put")}}
            <table class="dossier">
              <thead>
              <tr>
                <th v-for="key in columns">
                  <span v-text=" key" ></span>
                </th>
              </tr>
              </thead>
              <tbody>
              <tr v-for="adherent in adherents.data ">
                <td v-text="adherent.nom">
                </td>
                <td v-text="adherent.prenom">
                </td>
                <td>
                  <input
                  type='checkbox'
                  @click='checkAll(adherent)'
                  v-model='adherent.isCheckAll'>
                </td>
                <td>
                  <input
                  type='checkbox'
                  name="CertifMedical"
                  v-bind:value='adherent.CertifMedical'
                  v-model='adherent.CertifMedical'
                  @change='updateCheckallCertifMedical(adherent)'>
                </td>
                <td>
                  <input
                  type='checkbox'
                  v-bind:value='adherent.photo'
                  v-model='adherent.photo'
                  @change='updateCheckallphoto(adherent)'>
                </td>
                <td>
                  <input
                  type='checkbox'
                  v-bind:value='adherent.autorisationsRendues'
                  v-model='adherent.autorisationsRendues'
                  @change='updateCheckallautorisationsRendues(adherent)'>
                </td>
                <td>
                  <input
                  type='checkbox'
                  v-bind:value='adherent.RecuDemande'
                  v-model='adherent.RecuDemande'
                  @change='updateRecuDemande(adherent)'>
                </td>
                <td v-if="adherent.photo && adherent.autorisationsRendues && adherent.CertifMedical">
                  <i class="fas fa-smile Vert2"></i>
                </td>
                <td v-else>
                </td>
              </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
      <div class="row back">
        <a href="javascript:history.back()" class="btn-back">
          <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
        {!! $adherents->links()  !!}

        @endsection

        @section('script')
          <script>
            var app = new Vue({
              el: '#app',
              data: {
                isCheckAll: false,
                columns:["Nom","Prénom","Tout cocher","Certificat médical","Photo","Autorisations papiers","Attestation demandée","Dossier Complet"],
                dossiers:[],
                adherents:{!! $json !!},
              },
              methods: {
                checkAll: function (adherent) {
                  adherent.isCheckAll = !adherent.isCheckAll;
                  if (adherent.isCheckAll) {
                    adherent.photo = true;
                    adherent.autorisationsRendues = true;
                    adherent.CertifMedical = true;
                  }
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });

                  $.ajax({
                    type: "POST",
                    url: "./dossier/update",
                    data:{ "id":adherent.id,
                      "photo":true,
                      "autorisationsRendues":true,
                      "CertifMedical":true},

                  }).done(function(response){
                    console.log(response);
                  }).fail(function(error){
                    console.log(error);
                  })
                },
                updateCheckallphoto: function (adherent) {
                  if (adherent.photo && adherent.autorisationsRendues && adherent.CertifMedical) {
                    adherent.isCheckAll = true;
                  } else {
                    adherent.isCheckAll = false; }
                  if (adherent.photo==false){adherent.photo==true}
                  else{adherent.photo==false}
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });

                  $.ajax({
                    type: "POST",
                    url: "./dossier/update",
                    data:{ "id":adherent.id, "photo":adherent.photo},

                  }).done(function(response){
                    console.log(response);
                  }).fail(function(error){
                    console.log(error);
                  })
                },
                updateCheckallautorisationsRendues: function (adherent) {
                  if (adherent.photo && adherent.autorisationsRendues && adherent.CertifMedical) {
                    adherent.isCheckAll = true;
                  } else {
                    adherent.isCheckAll = false; }
                  if (adherent.autorisationsRendues==false){adherent.autorisationsRendues==true}
                  else{adherent.autorisationsRendues==false}
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });

                  $.ajax({
                    type: "POST",
                    url: "./dossier/update",
                    data:{ "id":adherent.id, "autorisationsRendues":adherent.autorisationsRendues},

                  }).done(function(response){
                    console.log(response);
                  }).fail(function(error){
                    console.log(error);
                  })
                },
                updateCheckallCertifMedical: function (adherent) {
                  if (adherent.photo && adherent.autorisationsRendues && adherent.CertifMedical) {
                    adherent.isCheckAll = true;
                  } else {
                    adherent.isCheckAll = false; }
                  if (adherent.CertifMedical==false){adherent.CertifMedical==true}
                  else{adherent.CertifMedical==false}
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });

                  $.ajax({
                    type: "POST",
                    url: "./dossier/update",
                    data:{ "id":adherent.id, "CertifMedical":adherent.CertifMedical},

                  }).done(function(response){
                    console.log(response);
                  }).fail(function(error){
                    console.log(error);
                  })
                },
                updateRecuDemande: function (adherent) {

                  if (adherent.RecuDemande==false){adherent.RecuDemande==true}
                  else{adherent.RecuDemande==false}
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });

                  $.ajax({
                    type: "POST",
                    url: "./dossier/update",
                    data:{ "id":adherent.id, "RecuDemande":adherent.RecuDemande},
                  }).done(function(response){
                    console.log(response);
                  }).fail(function(error){
                    console.log(error);
                  })
                },
              }
            });
          </script>
@endsection
