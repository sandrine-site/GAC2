@extends('layouts.app')
@section('content')
  <div class="row justify-content-center">
    <div class="col-8">
      <div class="card" id="app">
        <form id="app"  action='{{route('contact.create')}}'  method="post" >
                              {!!csrf_field ()  !!}
                    {{method_field ("put")}}
        <div class="card-header section2">Envoyer un mail</div>
        <div class="card-body section2" >
        Sujet:
          <input type="text" name="sujet"/>

        </div>
        <div class="card-body section2" >
        Vous pouvez rédiger votre message ici
          <textarea class="tiny" name="contenu">
          </textarea>
        </div>
        <div class="card-body section2" >
        Choisissez à qui envoyer le mail<br/>
        <div class="row justify-content-center">
            <select v-model = "category" v-on:change="onChange" name="category" id="select1">
              <option value="tous"> Tous les gymnastes</option>
              <option value="un">Un gymnaste</option>
            <option value="parGroupe"> Un groupe</option>
            <option value="parSection">Une section</option>
            <option value="parEntraineur"> Suivant l'entraineur</option>
            <option value="parCreneau">Suivant le creneau</option>
          </select>
          <select id="select2" v-model= "list" name="choix">
              <option  v-for="option in options" v-bind:value="option.id">@{{option.text}} </option>
          </select>
         </div>
         <br/>
         <div class="row justify-content-center ">
            <button type="submit" class='btn btn-bleu1'>
            <i class="fas fa-envelope-open-text"></i>
             Envoyer le mail
              </button>
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
      parSection: {!! $jsonSections!!},
      parEntraineur:  {!! $jsonEntraineurs!!},
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
<script>
  tinymce.init({
    selector: 'textarea.tiny',
    height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image tinydrive charmap print preview anchor textcolor image code',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | link image | bullist numlist outdent indent | removeformat | help',
    /* enable title field in the Image dialog*/
   image_title: true,
   /* enable automatic uploads of images represented by blob or data URIs*/
   automatic_uploads: true,
   /*
     URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
     images_upload_url: 'postAcceptor.php',
     here we add custom filepicker only to Image dialog
   */
   file_picker_types: 'image',
   /* and here's our custom image picker*/
   file_picker_callback: function (cb, value, meta) {
     var input = document.createElement('input');
     input.setAttribute('type', 'file');
     input.setAttribute('accept', 'image/*' +
      '');

     /*
       Note: In modern browsers input[type="file"] is functional without
       even adding it to the DOM, but that might not be the case in some older
       or quirky browsers like IE, so you might want to add it to the DOM
       just in case, and visually hide it. And do not forget do remove it
       once you do not need it anymore.
     */

     input.onchange = function () {
       var file = this.files[0];

       var reader = new FileReader();
       reader.onload = function () {
         /*
           Note: Now we need to register the blob in TinyMCEs image blob
           registry. In the next release this part hopefully won't be
           necessary, as we are looking to handle it internally.
         */
         var id = 'blobid' + (new Date()).getTime();
         var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
         var base64 = reader.result.split(',')[1];
         var blobInfo = blobCache.create(id, file, base64);
         blobCache.add(blobInfo);

         /* call the callback and populate the Title field with the file name */
         cb(blobInfo.blobUri(), { title: file.name });
       };
       reader.readAsDataURL(file);
     };

     input.click();
   }
 });

  </script>
@endsection
