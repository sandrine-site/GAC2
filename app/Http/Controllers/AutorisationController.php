<?php

namespace App\Http\Controllers;


use App\Adherent;
use App\Autorisation;
use App\Creneau;
use App\Groupe;
use App\Section;
use App\Tarif;
use App\MoyenPayement;
use Illuminate\Http\Request;

class AutorisationController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('grand',['only' => ['delete']]);
  }

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
    $tarifs=Tarif::all();
       $annee=(date ('Y',strtotime( $adherent->dateNaissance)));
       foreach ($tarifs->where('libele', 'Adhesion GAC') as $tarif) {
         $tarifAdhesion = $tarif->prix;
       }
       if ($adherent->section_id==3){
         $tarifmini=$tarifs->where('anneeMini','<',$annee);

         foreach ($tarifmini->where('anneeMax','>=',$annee) as $tarif) {
           $tarifLicence = $tarif->prix;
         }
       }
       else{
         $tarifLicence="0";
       }
       if ($adherent->section_id == 1) {
         foreach ($tarifs->where('section_id', 1) as $tarif) {
           $tarifCours = $tarif->prix;
         }
       } else {
         if ($tarifs->where('temps', $adherent->heureSemaine)!='[]'){
           foreach ($tarifs->where('temps', $adherent->heureSemaine) as $tarif) {
             $tarifCours = $tarif->prix;
           }
         }
         else{
           $tarifCours=0;
         }}
       $total=0;
       foreach ($adherent->payements as $payement)
       {$total=$total+$payement->montant; }
       $adherent->total=$total;
       $moyensPayements=MoyenPayement::all();
    return view('adherent.edit', compact('adherent', 'groupes', 'sections', 'creneaux','tarifAdhesion','tarifCours','tarifLicence','moyensPayements'));
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
