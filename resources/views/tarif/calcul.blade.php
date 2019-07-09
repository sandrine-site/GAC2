@extends('layouts.app')
@section('content')
  <br/>
  <div class="container groupe">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header section3">Calcul d'un tarif</div>
        <div class="card-body section3">
          <form method="post" action="{{route('tarif.calcul')}}">
            <div class="row start">
              {!!csrf_field ()  !!}
              <div class="col-3">
                <h4 class="fonce">Section:</h4><br/>
                @foreach($sections as $section)
                  <input type="radio" name="section_id" id="section_id" value="{{$section->id}}"/>
                  <label for="{{$section->id}}">{{$section->nom}}</label><br/>

                @endforeach
              </div>
              <div class="col-3">
                <h4 class="fonce"> Année de naissance:</h4><br/>
                <select
                  type="number"
                  name="annee"
                  id="annee"
                  >
                  @for($i=getdate ()[ 'year' ]-2;$i>1990;$i=$i-1)
                    <option value="{{$i}}">{{$i}}</option>
                  @endfor
                </select>
              </div>
              <div class="col-4">
                <h4 class="fonce"> Nombre d'heures par semaine:  <br/></h4>

                <select name="heureSemaine" id="heureSemaine" cols="10">
                  <option value="45min">45min (baby gym)</option>
                  <option value="1h">1h</option>
                  <option value="1h30">1h30</option>
                  <option value="2h">2h</option>
                  <option value="2h30">2h30</option>
                  <option value="3h">3h</option>
                  <option value="3h30">3h30</option>
                  <option value="4h">4h</option>
                  <option value="4h30">4h30</option>
                  <option value="5h">5h</option>
                  <option value="5h30">5h30</option>
                  <option value="6h">6h</option>
                  <option value="8h">8h</option>
                </select><br/>
              </div>
              <div class="col-2">
                <img src="../../public/images/ancv_cheques_vacances.jpg">
                <img src="../../public/images/coupon_sport_gac.png">

              </div>
            </div>
            <p> Vous avez la possibilité de payer par Chèques Vacances et Coupon SportPaiement, <br/>
                le paiement en trois fois est possible avant le 15 Janvier  par exemple 15 octobre, 15 Novembre, 15 décembre.(à noter au dos des chèques).
            <input type="submit" value="Calculer le tarif" class='btn btn-primary'/>
          </form>
        </div>
      </div>
      <br/>
      @isset($tarifAdhesion)
        <div class="card">
          @if($tarifCours!=0)
            <div class="card-header section6">

              Tarif pour : {{$tempsEcrit}} de gym en section {{$sectionEcrit}}
            </div>
            <div class="card-body section6">
              <table class="table-responsive">
                <thead>
                <tr>
                  <th></th>
                  <th>Prix(€)</th>
                </tr>

                </thead>
                <tbody>
                <tr>
                  <td>Adhesion au club</td>
                  <td>{{$tarifAdhesion}}</td>
                </tr>
                <tr>
                  <td>Licence UFOLEP</td>
                  <td>{{$tarifLicence}}</td>
                </tr>
                <tr>
                  <td>Cours</td>
                  <td>{{$tarifCours}}</td></tr>
                <tr>
                  <th>
                    Total
                  </th>
                  <th>{{$tarifAdhesion+$tarifLicence+$tarifCours}}</th>
                </tr>

                </tbody>
              </table>

          @else
            <div class="card-header section6">
              Nous ne pouvons calculer le tarif veuillez vous rapprocher de votre entraineur
            </div>
          @endif
          <div class="row" >
          <div class="col-1">
              <a type="button"  class="btn btn-primary" href="{{ route('adherent.create')}}"> Inscription</a>
            </div>
             </div></div>
        </div>
      @endisset


    </div>

  </div>
@endsection
