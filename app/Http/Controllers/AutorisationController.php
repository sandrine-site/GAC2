<?php

namespace App\Http\Controllers;


use App\Adherent;
use App\Autorisation;
use App\Creneau;
use App\Groupe;
use App\Section;
use Illuminate\Http\Request;

class AutorisationController extends Controller
{

  /*
							* Update the specified resource in storage.
							*
							* @param  \Illuminate\Http\Request  $request
							* @param  int  $id
							* @return \Illuminate\Http\Response
							*/
  public function update()
  {
    $autorisation = Autorisation::where('id', $_GET['id'])->get();
    foreach ($autorisation as $autorisation) {
      if ($autorisation->ok == 1) {
        $autorisation->ok = 0;
      } else {
        $autorisation->ok = 1;
      }
      Autorisation::where('id', $_GET['id'])->update(['ok' => $autorisation->ok]);
    }
    $adherent = Adherent::find($_GET['adherent_id']);
    $groupes = Groupe::orderBy('section_id')
      ->get();
    $sections = Section::all();
    $creneaux = Creneau::orderBy('jour_id')
      ->get();

    return view('adherent.edit', compact('adherent', 'groupes', 'sections', 'creneaux'));
  }

  public function index()
  {
    $adherents = Adherent::orderBy('nom')->orderBy('prenom')->paginate(20);
    foreach ($adherents as $adherent) {
      $autorisations = $adherent->autorisations;
      foreach ($autorisations as $autorisation) {
        if ($autorisation->typeAuto_id == 1) {
          $adherent->adherentUrg = $autorisation->ok;
        } elseif ($autorisation->typeAuto_id == 2) {
          $adherent->adherentTransp = $autorisation->ok;
        } elseif ($autorisation->typeAuto_id == 3) {
          $adherent->adherentMedia = $autorisation->ok;
        } elseif ($autorisation->typeAuto_id == 4) {
          $adherent->adherentSortie = $autorisation->ok;
        }

      }
    }
      $json = json_encode($adherents);
      return view('autorisations.index', compact('adherents', 'json'));

  }

  public function updateAll(Request $request)
  {
    if(isset($request->urgence)) {
      if ($request->urgence === true || $request->urgence === "true" || $request->urgence == "1" || $request->urgence == 1) {
        Autorisation::where('adherent_id', $request->id)->where('typeAuto_id', 1)->update(['ok' => 1]);
      } else {
        Autorisation::where('adherent_id', $request->id)->where('typeAuto_id', 1)->update(['ok' => 0]);
      }
    }
    if(isset($request->transport)) {
          if ($request->transport === true || $request->transport === "true" || $request->transport == "1" || $request->transport == 1) {
            Autorisation::where('adherent_id', $request->id)->where('typeAuto_id',2)->update(['ok' => 1]);
          } else {
            Autorisation::where('adherent_id', $request->id)->where('typeAuto_id', 2)->update(['ok' => 0]);
          }
        }
        if(isset($request->media)) {
          if ($request->media === true || $request->media === "true" || $request->media == "1" || $request->media == 1) {
            Autorisation::where('adherent_id', $request->id)->where('typeAuto_id',3)->update(['ok' => 1]);
          } else {
            Autorisation::where('adherent_id', $request->id)->where('typeAuto_id', 3)->update(['ok' => 0]);
          }
        }
        if(isset($request->sortie)) {
          if ($request->sortie === true || $request->sortie === "true" || $request->sortie == "1" || $request->sortie == 1) {
            Autorisation::where('adherent_id', $request->id)->where('typeAuto_id',4)->update(['ok' => 1]);
          } else {
            Autorisation::where('adherent_id', $request->id)->where('typeAuto_id',4)->update(['ok' => 0]);
          }
        }
      return ;
    }


}
