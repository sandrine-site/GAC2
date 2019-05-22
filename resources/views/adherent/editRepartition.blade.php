@extends('layouts.app')
@section('content')
    <br/>
    <div class="container">
        <div class="col-md-12">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Liste des gymnastes</div>
                    <div class="card-body">
                        <div id="app">
{{--                            <form action='./Adherent/updateRepartition' methode="post" name="repartition">--}}
{{--                                {!!csrf_field ()  !!}--}}
{{--                                {{method_field ("put")}}--}}
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


                                    <tr v-for="adherent in adherents">
                                        <td v-text="adherent.nom">    </td>
                                        <td v-text="adherent.prenom"></td>
                                        <td v-text="adherent.dateNaissance"></td>
                                        <td v-text="adherent.heureSemaine"></td>
                                        <td v-text="adherent.section.nom"></td>
                                        <td v-if="adherent.groupe!=null" v-text="adherent.groupe.nom">
                                            <select
                                                id="groupe"
                                                v-model="groupe"
                                                name="groupe">
                                                <option
                                                v-if="adherent.groupe!=null"
                                                v-text="adherent.groupe.nom" >
                                                </option>
                                                <option v-else="adherent.groupe!=null"
                                                 >Choisir dans la liste</option>
                                                <option v-for="groupe in groupe" v-bind:value="horaire.id" v-text="horaire.creneauphrase" ></option></td>
                                        <td v-else v-text=""></td>
                                        <td>
                                            <span
                                            v-if="adherent.adherentCre!=null"
                                            v-for="adherent.adherentCre inadherent.adherentCre"
                                            class="adherent.adherentCre"
                                            v-text="adherent.adherentCre ">
                                            </span>
                                            <button v-if="adherent.adherentCre!=null"
                                            v-on:click="deleteCreneaux(adherent)" >
                                            <i class="fas fa-times-circle"></i>
                                            </button>
                                        <select
                                            id="creneau"
                                            v-model="creneau"
                                            name="creneau"
                                        >
                                            <option value="" >Choisir dans la liste</option>
                                            <option v-for="horaire in creneaux" v-bind:value="horaire.id" v-text="horaire.creneauphrase" ></option>
                        </select>
                        </td>
                        </tr>
                        </tbody>
                        </table>
{{--                        </form>--}}
                    </div>
                </div>
                <a href="#ListeParGroupe"></a>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                creneaux:{!! $json !!},
                adherents:{!! $jsonAdherents !!},
                sections:{!! $jsonSections !!}
                groupe:{!! $jsonGroupes !!}
            },

            methods: {
                deleteCreneaux: function (adherent) {
                console.log(adherent.adherentCre);
                    adherent.adherentCre=null;
                }}
        })
    </script>
@endsection
