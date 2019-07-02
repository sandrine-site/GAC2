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
            <table class=" table-responsive">
              <thead>
              <tr>
                <th>libelé</th>
                <th>Prix(€)</th>
                <th>Section</th>
                <th>Nbr heure/semaine</th>
                <th>Année naissance<br/> mini</th>
                <th>Année naissance<br/> maxi</th>
                <th></th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($tarifs as $tarif)
                @if ($tarif->id<5)
                  <tr>
                    <form method="post" action="{{route('tarif.update',$tarif->id)}}">
                      {!!csrf_field ()  !!}
                      <input type="hidden" name="id" value="{{$tarif->id}}"/>
                      <td><input type="hidden" name="libele"  value="{{$tarif->libele}}"/>
                        {{$tarif->libele}}
                      </td>
                      <td><input type="text" name="prix" class="form-invisible"  placeholder='{{$tarif->prix}}' value="{{$tarif->prix}}"/>
                      </td>
                      <td>
                        @if($tarif->section_id==2)
                          Compétition
                        @else Pour toute les sections
                        @endif</td>
                      <td> <input type="hidden" name="temps" value=0/> </td>
                      <td>
                        <select type="text" name="anneeMini" id="anneeMini" >
                          @if(isset($tarif->anneeMini))
                            @if($tarif->anneeMini==0||$tarif->anneeMini=='0')
                              <option value=0>Pas de limite</option>
                            @else
                              <option value="{{$tarif->anneeMini}}">{{$tarif->anneeMini}}</option>
                            @endif
                          @endif
                          <option value=0>Pas de limite</option>
                          @for($i=2024;$i>1936;$i=$i-1)
                            <option value="{{$i}}">{{$i}}</option>
                          @endfor
                        </select>
                      </td>
                      <td>
                        <select type="text" name="anneeMaxi" id="anneeMaxi" >
                          @if(isset($tarif->anneeMax))
                            @if($tarif->anneeMax==0)
                              <option value=0>Pas de limite</option>
                            @else
                              <option value="{{$tarif->anneeMax}}">{{$tarif->anneeMax}}</option>
                            @endif
                          @else
                            <option value=0>Pas de limite</option>
                          @endif
                          @for($i=2024;$i>1936;$i=$i-1)
                            <option value="{{$i}}">{{$i}}</option>
                          @endfor
                        </select>
                      </td>
                      <td><input type="submit" value="Modifier" class=' btn btn-dark'/></td>
                    </form>
                  </tr>
                @else
                  <form method="post" action="{{route('tarif.update',$tarif->id)}}">
                    {!!csrf_field ()  !!}
                    <input type="hidden" name="id" value="{{$tarif->id}}"/>
                    <td>
                      <input type="text" class="form-invisible" name="libele"  placeholder='{{$tarif->libele}}' value="{{$tarif->libele}}"/>
                    </td>
                    <td><input type="text" name="prix" class="form-invisible"  placeholder='{{$tarif->prix}}' value="{{$tarif->prix}}"/>
                    </td>
                    <td>
                      <select  name="section_id" id="section" >
                        @if(isset($tarif->section_id)&&($tarif->section_id!=0||$tarif->section_id!="0")&&$tarif->section!=null)
                          <option value="{{$tarif->section_id}}">{{$tarif->section->nom}}</option>
                        @elseif(isset($tarif->section_id)&&$tarif->section_id==0)
                          <option value='0'>Pour toute les sections</option>
                        @else
                          <option value='0'>Pour toute les sections</option>
                        @endif
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
                        <option value=""> </option>
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
                          @if($tarif->anneeMini==0||$tarif->anneeMini=='0')
                            <option value=0>Pas de limite</option>
                          @else
                            <option value="{{$tarif->anneeMini}}">{{$tarif->anneeMini}}</option>
                          @endif
                        @endif

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
                        <option value="0">Pas de limite</option>
                        @for($i=2024;$i>1936;$i=$i-1)
                          <option value="{{$i}}">{{$i}}</option>
                        @endfor
                      </select>
                    </td>
                    <td><input type="submit" value="Modifier" class='btn btn-dark'/></td>
                  </form>
                  <td>    {!! Form::open(['method' => 'DELETE', 'route' => ['tarif.destroy', $tarif->id]]) !!}
                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger', 'onclick' => 'return confirm(\'Vraiment supprimer ce creneau ?\')']) !!}
                    {!! Form::close() !!}
                  </td>
                  </tr>
                @endif
              @endforeach
              <tr>
                <form method="post" action="{{route('tarif.store')}}">
                  {!!csrf_field ()  !!}
                  <td>
                    <input type="text" class="form-invisible" name="libele"  placeholder='intitulé' />
                  </td>
                  <td><input type="text" name="prix" class="form-invisible"  placeholder='prix (€)' />
                  </td>
                  <td>
                    <select  name="section_id" id="section" >
                      <option value='0'>Pour toute les sections</option>
                      @foreach($sections as $section)
                        <option value="{{$section->id}}">{{$section->nom}}</option>
                      @endforeach
                    </select>
                  </td>
                  <td>
                    <select  name="temps" id="temps" >
                      <option value=""> </option>
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
                      <option value=0>Pas de limite</option>
                      @for($i=2024;$i>1990;$i=$i-1)
                        <option value="{{$i}}">{{$i}}</option>
                      @endfor
                    </select>
                  </td>
                  <td>
                    <select type="text" name="anneeMaxi" id="anneeMaxi" >
                      <option value="0">Pas de limite</option>
                      @for($i=2024;$i>1990;$i=$i-1)
                        <option value="{{$i}}">{{$i}}</option>
                      @endfor
                    </select>
                  </td>
                  <td><input type="submit" value="Enregistrer" class='btn btn-primary'/></td>
                </form>
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
      <a href="{{route('home')}}"
         class="btn-home "
      >Accueil administration
        <i class="fas fa-home"></i>
      </a>
    </div>
  </div>

@endsection
