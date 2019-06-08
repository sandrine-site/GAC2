@extends('layouts.app')
@section('content')
  <br/>
  <div class="container groupe">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header section1">Modification du groupe {{$groupe->nom}}</div>

        <div class="card-body section1">
          <form method="post" action="{{route('groupe.update',$groupe->id)}}">
            {!!csrf_field ()  !!}
            {{method_field ("put")}}
            <input type="hidden" name="id" value="{{$groupe->id}}">
            <table>
              <tbody>
              <tr>
                <td><input type="text" name="nom"  placeholder='{{$groupe->nom}}' value="{{$groupe->nom}}"/>
                </td>
                <td><input type="text" name="categorie"  placeholder='{{$groupe->categorie}}' value="{{$groupe->categorie}}"/>
                </td>
                <td>
                  <label for="user_id">Entraineur(s) :</label><br/>
                  @foreach($users as $user)
                    @if($user->fonction_id==4)

                      @foreach($groupe->users as $entraineur)
                        @if($entraineur->id===$user->id)
                          <input checked type="checkbox" name="user_id" value="{!! $user->id!!}"/>
                          <label for="{!! $user->id!!}"> {!!$user->prenom!!} </label><br/>
                        @else
                          <input  type="checkbox" name="user_id" value="{!! $user->id!!}"/>
                          <label for="{!! $user->id!!}"> {!!$user->prenom!!} </label><br/>
                        @endif
                      @endforeach
                    @endif
                  @endforeach</td>
                <td>
                  <select name="section_id" class="medium">

                    <option value="{{$groupe->section->id}}">{{$groupe->section->nom}}</option>
                    @foreach($sections as $section)

                      <option value='{{$section->id}}'>{{$section->nom}}</option>
                    @endforeach
                  </select></td>
                <td><input type="submit" value="Enregistre" class='btn btn-primary btn-block'/></td>
                <td></td>

              </tr>
              </tbody>
            </table>
          </form> </div>
      </div>
      <div class="row back">

        <a href="javascript:history.back()" class="btn-back ">
          <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>

      </div>
    </div>

@endsection
