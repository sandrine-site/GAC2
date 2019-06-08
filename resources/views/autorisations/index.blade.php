@extends('layouts.app')
@section('content')
  <div class="row justify-content-center">
    <div class="col-6">
      <div class="card" >
        <div class="card-header section6">Gestion des autorisations</div>
        <div class="card-body section6" id="dossier">
          <form
            id="app"
            action='./dossier/update'
            method="post" >
            {!!csrf_field ()  !!}
            {{method_field ("put")}}
            <table class="autorisation">
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
                  <input type='checkbox' name="Urgence" v-bind:value='adherent.adherentUrg' v-model='adherent.adherentUrg' @change='updateUrgence(adherent)'>
                </td>
                <td>
                  <input type='checkbox' v-bind:value='adherent.adherentTransp' v-model='adherent.adherentTransp' @change='updateTransport(adherent)'>
                </td>
                <td>
                  <input type='checkbox' v-bind:value='adherent.adherentMedia' v-model='adherent.adherentMedia' @change='updateMedia(adherent)'>
                </td>
                <td>
                  <input type='checkbox' v-bind:value='adherent.adherentSortie' v-model='adherent.adherentSortie'  @change='updateSortie(adherent)'>
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
                columns:["Nom","Prénom","Urgence","Transport","Média","Sortie"],
                dossiers:[],
                adherents:{!! $json !!},
              },

              methods: {
                updateUrgence: function (adherent) {
                  if (adherent.adherentUrg==false){adherent.adherentsUrg==true}
                  else{adherent.adherentUrg==false}
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });

                  $.ajax({
                    type: "POST",
                    url: "./autorisation/updateAll",
                    data:{ "id":adherent.id, "urgence":adherent.adherentUrg},

                  }).done(function(response){
                    console.log(response);
                  }).fail(function(error){
                    console.log(error);
                  })
                },
                updateTransport: function (adherent) {
                  if (adherent.adherentTransp==false){adherent.adherentTransp==true}
                  else{adherent.adherentTransp==false}
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });

                  $.ajax({
                    type: "POST",
                    url: "./autorisation/updateAll",
                    data:{ "id":adherent.id, "transport":adherent.adherentTransp},

                  }).done(function(response){
                    console.log(response);
                  }).fail(function(error){
                    console.log(error);
                  })
                },
                updateMedia: function (adherent) {
                  if (adherent.adherentMedia==false){adherent.adherentMedia==true}
                  else{adherent.adherentMedia==false}
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });

                  $.ajax({
                    type: "POST",
                    url: "./autorisation/updateAll",
                    data:{ "id":adherent.id, "media":adherent.adherentMedia},

                  }).done(function(response){
                    console.log(response);
                  }).fail(function(error){
                    console.log(error);
                  })
                },
                updateSortie: function (adherent) {
                  if (adherent.adherentSortie==false){adherent.adherentSortie==true}
                  else{adherent.adherentSortie==false}
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });

                  $.ajax({
                    type: "POST",
                    url: "./autorisation/updateAll",
                    data:{ "id":adherent.id, "sortie":adherent.adherentSortie},

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
