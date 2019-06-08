@extends('layouts.app')
@section('content')
    <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card" >
                            <div class="card-header">Gestion des dossiers</div>
                            <div class="card-body" id="dossier">
                            <div id="app">
                                <form action='./adherent/updateDocument' method="get">
                                    {!!csrf_field ()  !!}
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
           <td v-text="adherent">
                  </td>
                  <td>
           <input type='checkbox' id="adherent.id" @click='CheckAll(adherent)'   :indeterminate="indeterminate"  v-model='adherent.CheckAll' >
                  </td>

                  <td v-for="doc in docsdata ">

                      <input type='checkbox' id="adherent.doc" name="adherent.doc" value="1" unchecked-value="0" v-model='adherent.documents' @change='updateCheckAll()'><span v-text="doc" ></span>
                  </td>



       </tr>




                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </div>{!! $adherents->links()  !!}
    </div>



    @endsection

@section('script')
<script>
var vue=new Vue({
el:"#app",
data:{
    indeterminate: false,
    CheckAll: false,
    adherents:{!! $json !!},
    selecteddoc:"",

    columns:["Nom","Prénom","Tout cocher","Certificat médical","Photo","Autorisations papiers","Attestation demandée","Dossier Complet"],
    docsdata:["CertifMedical","photo","autorisationsRendues"],
documents:[],
},
    methods:{
        CheckAll: function(){
        this.documents=doc.documents;
           // this.isCheckAll = !this.isCheckAll;
            documents = Array=[];
            if(this.isCheckAll){
                for (var key in this.docsdata) {
                   documents.push(this.docsdata[key]);
                }  }
        },
        updateCheckAll: function(){

            if(this.documents.length == this.docsdata.length){
                this.CheckAll = true;
            }else{
                this.CheckAll = false;
            }
        }
    },
    // watch: {
    //      selected(newVal, oldVal) {
    //
    //        if (newVal.length === 0) {
    //          this.indeterminate = false;
    //          this.CheckAll= false;
    //        } else if (newVal.length === this.flavours.length) {
    //          this.indeterminate = false;
    //          this.CheckAll = true;
    //        } else {
    //          this.indeterminate = true;
    //          this.CheckAll = false;
    //        }
    //      }
    //    }
})
</script>
@endsection
