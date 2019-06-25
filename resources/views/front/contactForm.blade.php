@extends('layouts.app')
@section('content')

  <div class="contactForm">

    <div class="row row-contactForm">
<div class="offset-3 col-6">
 <div class="card cardcontactForm">
<div class="card-header cardcontactForm">
  Contact
</div>
<div class="card-body cardcontactForm">
<div class="offset-1 col-10">
  <form action='{{route('contactForm.send')}}' methode="post" name="form">
                            {!!csrf_field ()  !!}
                            {{method_field ("get")}}
    C’est avec plaisir que nous répondrons à vos questions. <br/>
    C’est avec le même plaisir que nous accepterons vos suggestions. <br/>
    En complétant le formulaire suivant. Vous nous permettez de répondre plus efficacement
     à votre demande. Dès réception de votre demande nous tâcherons d’apporter une réponse.<br/>
    <label for="sujet">Sujet du message :<em>(et section concernée)</em></label>
                   <input type="text" name="sujet" id="sujet" class="form-control" value="{{old("sujet","")}}"/>

                                                        <label for="name">Votre nom :<em>(obligatoire)</em></label>
                   <input type="text" name="name" id="name" class="form-control" value="{{old("name","")}}"/>
                                                   @if ($errors->has("name"))
                                                       <x-small class="help-block">{{$errors->first("name",':message') }}</x-small>  @endif
                                                        <label for="mail">Votre email :<em>(obligatoire)</em></label>
                   <input type="email" name="mail" id="mail" class="form-control" value="{{old("mail","")}}"/>
                                                   @if ($errors->has("mail"))
                                                       <x-small class="help-block">{{$errors->first("mail",':message') }}</x-small>  @endif
    <input type="checkbox" name="club" id="club" value="club">
            <label for="club" value="club">Membre club</label><br/>
    <label for="content">Votre message :</label>
                       <textarea  name="content" id="content" class="form-control" value="{{old("content","")}}"></textarea>

                 </div>
                 <div class="row justify-content-center">
                 <input type="submit" value="Envoyer" class='btn-outline-primary'/>
                   </form>
                 </div>


      </div>
        </div>
</div>
    </div>
  </div>
@endsection
