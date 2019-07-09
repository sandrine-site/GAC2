@extends('layouts.app')
@section('content')
  <div class="row justify-content-center">
    <div class="col-8">
      <div class="card" id="app">
        <form id="app"  action='{{route('contact.createSMS')}}'  method="post" >
                              {!!csrf_field ()  !!}
                    {{method_field ("put")}}
        <div class="card-header section5">Envoyer un SMS</div>
        <div class="card-body section5" >

        <div class="card-body section5" >
        Choisissez à qui envoyer le SMS<br/>
        <div class="row justify-content-between">
            <select v-model = "category" v-on:change="onChange" name="category" id="select1">
              <option value="tous"> Tous les gymnastes</option>
              <option value="un">Un gymnaste</option>
            <option value="parGroupe"> Un groupe</option>
            <option value="parSection">Une section</option>
            <option value="parEntraineur"> Suivant l'entraineur</option>
            <option value="parCreneau">Suivant le creneau</option>
          </select>
          <select id="select5" v-model= "list" name="choix">
              <option  v-for="option in options" v-bind:value="option.id">@{{option.text}} </option>
          </select>

         <input type="checkbox" name="respLegal1" id="respLegal1" value="respLegal1">
         <label for="respLegal">Au responsable légal 1</label><br/>
         <input type="checkbox" name="respLegal2" id="respLegal2" value="respLegal2">
         <label for="respLegal">Au responsable légal 2</label><br/>
         <input type="checkbox" name="telAdherent" id="telAdherent" value="telAdherent">
         <label for="telAdherent">A l'adhérent</label>
        </div>
         <br/>
         <div class="row justify-content-center ">
            <button type="submit" class='btn btn-vert2'>
              <i class="fas fa-sms"></i>
             Envoyer le sms
              </button>
         </div>
        </div>
          </form>
        </div>
          </div>
      </div></div>
       </div>
      </div>
  <div class="row back">
        <a href="javascript:history.back()" class="btn-back">
          <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>

        <a href="{{route('home')}}"
           class="btn-home "
        >Accueil administration
                                   <i class="fas fa-home"></i>
                                 </a>
      </div>
  </div>
  </div>

@endsection

@section('script')
  <script>

new Vue({
  el:'#app',
  data: {
    category: '',
    list: '',
    optionsData: {
      tous: {text: '', value: ''},
      un:{!!$jsonAdherents!!},
      parGroupe:{!! $jsonGroupes!!},
      parSection:{!! $jsonSections!!},
      parEntraineur: {!! $jsonEntraineurs!!},
      parCreneau:{!! $jsonCreneaux!!},
    }
  },
  computed: {
    options: function() {
      let options = ''
      switch(this.category) {
        case 'tous':
          options = ""
          break;
        case 'un':
          options = this.optionsData.un
          break;
        case 'parGroupe':
          options = this.optionsData.parGroupe
          break;
        case 'parSection':
          options = this.optionsData.parSection
          break;
        case 'parEntraineur':
          options = this.optionsData.parEntraineur
          break;
        case 'parCreneau':
          options = this.optionsData.parCreneau
          break;

      }

      return options

    }

  },

  methods: {

    onChange: function ()
    {
      console.log(this.options.text);
      this.options = this.options
    }

  }

})
</script>

@endsection
