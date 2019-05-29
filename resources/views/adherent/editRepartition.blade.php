@extends('layouts.app')
@section('content')
    <br/>
    <div class="container repartition">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Liste des gymnastes</div>
                    <div class="card-body">
                        <li id="app">
                            <form action='#' methode="post" name="repartition">
                                {!!csrf_field ()  !!}
                                {{method_field ("post")}}
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
                                    <tr v-for="adherent in adherentsdata">
                                        <td v-text="adherent.nom"></td>
                                        <td v-text="adherent.prenom"></td>
                                        <td v-text="adherent.dateNaissance"></td>
                                        <td v-text="adherent.heureSemaine"></td>
                                        <td v-text="adherent.section.nom"></td>
                                        <td
                                            v-if="adherent.groupe!=null">

                                            <span
                                                v-text="adherent.groupe.nom">

                                            </span>
                                            <button
                                                v-if="adherent.groupe!=null"
                                                v-on:click="deleteGroupe(adherent)">
                                                <i class="fas fa-exchange-alt"></i>
                                            </button>
                                        </td>
                                        <td v-else>
                                            <select
                                                v-model="groupe[adherent.id]"
                                              v-on:change="changeGroupe(adherent)"
                                                name="groupe">
                                                <option>Choisir dans la liste</option>
                                                <option
                                                    v-for="groupe in groupedata"
                                                    v-bind:value="groupe"
                                                    v-text="groupe.nom"
                                                   >
                                                </option>
                                            </select>
                                        </td>
                                      <td ><ul id="creneau">
                                      <li  v-for="creneau in adherent.creneaux"
                                      >
                                      @{{creneau.creneauPhrase }}
                                        <button
                                          v-on:click="deleteCreneaux(adherent,creneau)">
                                          <i class="far fa-times-circle"></i>
                                        </button></li>

                                           <li> <select
                                                id="creneau"
                                                v-model="creneau"
                                                name="creneau"
                                               v-on:click= "addCreneau(adherent,creneau)"
                                            >
                                                <option value="" >Choisir dans la liste</option>
                                                <option
                                                v-for="horaire in creneauxdata"
                                                v-bind:value="horaire"
                                                v-text="horaire.creneauphrase" >
                                                </option>
                                            </select></li>
                                        </ul>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>


                </div>
            </div>



        <div class="row back">

            <a href="javascript:history.back()" class="btn-back">
                <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
            </a>



        </div>  </div>
@endsection
@section('script')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                creneauxdata:{!! $json !!},
                adherentsdata:{!! $jsonAdherents !!},
                sectionsdata:{!!$jsonSections!!},
                groupedata:{!!$jsonGroupes!!},
                groupe:[],
            },
            methods: {

                deleteCreneaux: function (adherent,creneau) {
                                            adherent.creneau=false;

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "POST",
                        url: "{{route('adherent.updateRepartition')}}",
                        data:{ "adherent_id":adherent.id, "creneau_id":creneau.id,'value':false},
                    }).done(function(response){
                        console.log(response);
                    }).fail(function(error){
                        console.log(error);
                    })
                },

                deleteGroupe:function(adherent){
                    adherent.groupe=null;

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "{{route('adherent.updateRepartition')}}",
                        data:{
                            "id":adherent.id,
                            "groupe_id":false}
                    }).done(function(response){
                        console.log(response);
                    }).fail(function(error){
                        console.log(error);
                    })
                },
                changeGroupe:function(adherent){

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "{{route('adherent.updateRepartition')}}",
                        data:{
                            "id":adherent.id,
                            "groupe_id":this.groupe[adherent.id].id}
                    }).done((response)=>{
                      adherent.groupe=this.groupe[adherent.id];
                    }).fail(function(error){
                    alert("désolé nous ne pouvons pas enregistrer l'information pour le moment");
                        console.log(error);
                    })
                },
              addCreneau:function(adherent,creneau){

                adherent.creneaux.push(creneau);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "{{route('adherent.updateRepartition')}}",
                        data:{
                          "adherent_id":adherent.id,
                          "creneau_id":creneau.id,
                          'value':true,
                          }
                    }).done(function(response){
                        console.log(response);
                    }).fail(function(error){
                        console.log(error);
                    })
                },

            }})
    </script>
@endsection
