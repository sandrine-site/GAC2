@extends('layouts.app')
@section('content')

  <div class="contactForm">
    <div class="row row-contactForm">
        <div class="card contactForm">
          <div class="card-header contactForm ">Contact</div>
          <div class="card-body contactForm">
            <form action='#' methode="post" name="contact">
                           {!!csrf_field ()  !!}
                           {{method_field ("post")}}
            <div class="row display-5">
                C’est avec plaisir que nous répondrons à vos questions.

                C’est avec le même plaisir que nous accepterons vos suggestions.
                En complétant le formulaire suivant. Vous nous permettez de répondre plus efficacement à votre demande.

                Dés réception de votre demande nous tacherons d’apporter une réponse.
              <div class="col-6">
                <label for="sujet">Sujet du message :<em>(obligatoire)</em></label>
                <input type="text" name="sujet" id="sujet" class="form-control" value="{{old("sujet","")}}"/>
                                                @if ($errors->has("sujet"))
                                                    <small class="help-block">{{$errors->first("sujet",':message') }}</small>  @endif

              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>






@endsection
