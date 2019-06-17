@extends('layouts.app')
@section('content')
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="card" >
        <div class="card-header section6">Gestion des Payements</div>
        <div class="card-body section6" id="payement">
          <div class="col-12" id="payement" >
            <div class="row strong">
              <div class="col-2">Nom Prenom</div>
              <div class="col-1">Montant adhésion</div>
              <div class="col-1">Montant payé</div>
              <div class="col-1">Payement</div>
            </div>
            @foreach($adherents as $adherent)
              <div class="row">
                <div class="col-2">{{$adherent->nom}} {{$adherent->prenom}}</div>
                <div class="col-1"> {{$adherent->montant}} </div>
                <div class="col-1"> {{$adherent->totalpaye}}</div>
                @foreach($adherent->payements as $payement)
                  <div class="col-1">
                    <form
                      action='{{route('payement.update')}}'
                      method="post" >
                      {!!csrf_field ()  !!}
                      <input type="hidden" value="adherent->id" name="adherent_id"/>
                      <input type="hidden" name="id" value="{{$payement->id?:'null'}}"/>
                      <input type="text"
                             class="form-invisible"
                             size="6"
                             name="montant"
                             placeholder="{{$payement->montant?:'montant'}}"
                      />
                      <select name="moyensPayement_id" cols="10">
                        @isset($payement->moyensPayement_id)
                          <option value="{{$payement->moyensPayement_id}}">{{App\MoyenPayement::find($payement->moyensPayement_id)->type}}</option>
                        @endisset
                        @foreach($moyensPayements as $moyensPayement)
                          <option value="{{$moyensPayement->id}}">{{$moyensPayement->type}}</option>
                        @endforeach
                      </select><br/>
                      <input type="text"
                             class="form-invisible"
                             size="10"
                             name="encaisseMois"
                             placeholder="{{$payement->encaisseMois?:'jj/mm'}}"
                      />
                      <input type="text"
                             class="form-invisible"
                             name="numCheque"
                             size="12"
                             placeholder="{{$payement->numCheque?:'n° Cheque'}}"
                      /><br/>
                      <button type="submit" class="btn-outline-exchange"><i class="fas fa-exchange-alt"></i></button>
                    </form>
                    <a class="btn-outline-trash" href="{{route('payement.destroy',[$payement->id,$adherent->id])}}"  role="button"  ><i class="fas fa-trash-alt"></i></a></td>
                  </div>
                @endforeach
                <div class="col-1">
                  <form
                    action='{{route('payement.store')}}'
                    method="post" >
                    {!!csrf_field ()  !!}
                    <input type="hidden" value="{{$adherent->id}}" name="adherent_id"/>
                    <input type="text"
                           class="form-invisible"
                           size="6"
                           name="montant"
                           placeholder="montant"
                    />
                    <select name="moyensPayement_id" cols="10">
                      @foreach($moyensPayements as $moyensPayement)
                        <option value="{{$moyensPayement->id}}">{{$moyensPayement->type}}</option>
                      @endforeach
                    </select><br/>
                    <input type="text"
                           class="form-invisible"
                           size="10"
                           name="encaisseMois"
                           placeholder="jj/mm"
                    />
                    <input type="text"
                           class="form-invisible"
                           name="numCheque"
                           size="12"
                           placeholder="n° Cheque"
                    /><br/>
                    <button type="submit" class="btn-outline-cyan">Ajouter un  payement</button>
                  </form>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        </div>
              </div>
        <div class="row back">
          <a href="javascript:history.back()" class="btn-back">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
          </a>
          {!! $adherents->links()  !!}
          <a href="{{route('home')}}"
             class="btn-home "
          >Accueil administration
            <i class="fas fa-home"></i>
          </a>
        </div>
  </div>


@endsection

@section('script')

@endsection
