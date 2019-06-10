@extends('layouts.app')
@section('content')
  <br/>
  <div class="container groupe">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header section3">Tarifs</div>
        <div class="card-body section3">
          <form method="post" action="{{route('tarif.update')}}">
            {!!csrf_field ()  !!}
            {{method_field ("put")}}
            <table>
            <thead>
            <tr>
              <th>libelé</th>
              <th>Prix(€)</th>
              <th>Section</th>
              <th>Nbr heure/semaine</th>
              <th>Année naissance mini</th>
              <th>Année naissance maxi</th>
              <th></th>
              <th></th>
            </tr>

            </thead>
              <tbody>
              @foreach($tarifs as $tarif)
              <tr>
                <form method="post" action="{{route('tarif.update',$tarif->id)}}">
                            {!!csrf_field ()  !!}

                            <input type="hidden" name="id" value="{{$tarif->id}}"/>
                <td><input type="text" class="form-invisible" name="libele"  placeholder='{{$tarif->libele}}' value="{{$tarif->libele}}"/>
                </td>
                <td><input type="text" name="prix" class="form-invisible"  placeholder='{{$tarif->prix}}' value="{{$tarif->prix}}"/>
                </td>
                <td>

                  <select  name="section_id" id="section" >
                    @if(isset($tarif->section_id)&&$tarif->section_id!=0)
                      <option value="{{$tarif->section_id}}">{{$tarif->section->nom}}</option>
                      @elseif(isset($tarif->section_id)&&$tarif->section_id==0)
                      <option value='0'>Pour toute</option>
                    @endif
                    <option value='0'>Pour toute</option>
                    @foreach($sections as $section)
                      <option value="{{$section->id}}">{{$section->nom}}</option>
                    @endforeach
                  </select>
                </td>
                <td>
                  <select  name="temps" id="temps" >
                    @if(isset($tarif->temps))
                      <option value="{{$tarif->temps}}">{{$tarif->temps}}</option>
                      @endif
                      <option value="tous">Pour tous</option>
                      <option value="45min">45min</option>
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
                  </select>
                </td>
                <td>
                <select type="text" name="anneeMini" id="anneeMini" >
                @if(isset($tarif->anneeMini))
                    <option value="{{$tarif->anneeMini}}">{{$tarif->anneeMini}}</option>
                    @endif
                  <option value="tous">Pour tous</option>
                  @for($i=2024;$i>1936;$i=$i-1)
                    <option value="{{$i}}">{{$i}}</option>
                  @endfor
                </select>
                </td>
                <td>
                <select type="text" name="anneeMaxi" id="anneeMaxi" >
                @if(isset($tarif->anneeMaxi))
                    <option value="{{$tarif->anneeMaxi}}">{{$tarif->anneeMaxi}}</option>
                    @endif
                  <option value="tous">Pour tous</option>
                  @for($i=2024;$i>1936;$i=$i-1)
                    <option value="{{$i}}">{{$i}}</option>
                  @endfor
                </select>
                </td>
                  <td><input type="submit" value="Modifier" class='btn btn-primary'/></td></form>
                <td>{!! Form::open(['method' => 'DELETE', 'route' => ['tarif.destroy', $tarif->id]]) !!}
                                  {!! Form::submit('Supprimer', ['class' => 'btn btn-bleu2', 'onclick' => 'return confirm(\'Vraiment supprimer ce tarif ?\')']) !!}
                                  {!! Form::close() !!}</td>

              </tr>
              @endforeach

                  <tr>
                    <form method="post" action="{{route('tarif.store')}}">
                      {!!csrf_field ()  !!}

                      <td><input type="text" class="form-invisible" name="libele"  placeholder='libelé' />
                      </td>
                      <td><input type="text" name="prix" class="form-invisible"  placeholder='prix (€)' />
                      </td>
                      <td>
                        <select  name="section_id" id="section" >
                          <option value='0'>Pour toutes</option>
                          @foreach($sections as $section)
                            <option value="{{$section->id}}">{{$section->nom}}</option>
                          @endforeach
                        </select>
                      </td>
                      <td>
                        <select  name="temps" id="temps" >
                          <option value="tous">Pour tous</option>
                          <option value="45min">45min</option>
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
                        </select>
                      </td>
                      <td>
                        <select type="text" name="anneeMini" id="anneeMini" >
                          @if(isset($tarif->anneeMini))
                            <option value="{{$tarif->anneeMini}}">{{$tarif->anneeMini}}</option>
                          @endif
                          <option value="tous">Pour tous</option>
                          @for($i=2024;$i>1936;$i=$i-1)
                            <option value="{{$i}}">{{$i}}</option>
                          @endfor
                        </select>
                      </td>
                      <td>
                        <select type="text" name="anneeMaxi" id="anneeMaxi" >
                          <option value="tous">Pour tous</option>
                          @for($i=2024;$i>1936;$i=$i-1)
                            <option value="{{$i}}">{{$i}}</option>
                          @endfor
                        </select>
                      </td>
                      <td><input type="submit" value="Enregistrer" class='btn btn-primary'/></td>
                      <td></td>

                  </tr>
                </tbody>
        </table>
        </div>
        </div>
      </div>
      <div class="row back">

        <a href="javascript:history.back()" class="btn-back ">
          <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>

      </div>
    </div>

@endsection
