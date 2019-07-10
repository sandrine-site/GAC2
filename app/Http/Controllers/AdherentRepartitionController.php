<?php

namespace App\Http\Controllers;

use App\Adherent;
use App\Autorisation;
use App\Autorisations;
use App\Creneau;
use App\Groupe;
use App\Http\Requests\AdherentCreateRequest;
use App\Http\Requests\AdherentUpdateGroupeRequest;
use App\Remarque;
use App\Section;
use App\Section_adherent;
use App\Telephone;
use App\User;
use App\Lieu;
use Illuminate\Http\Request;

class AdherentRepartitionController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');

  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function indexRepartition()
  {
    $adherents=Adherent::orderBy('section_id')->orderBy('groupe_id')->orderBy('dateNaissance','desc')->get();
    $sections=Section::all();
    $groupes=Groupe::all();
    $creneaux=Creneau::all();
    foreach ($adherents as $adherent){
      $adherent->adherentgrp=$adherent->groupe;
      $adherent->adherentsect= $adherent->section;
      $adherent->dateNaissance=strftime("%d/%m/%G", strtotime($adherent->dateNaissance));
      foreach ($adherent->creneaux as $creneau){
        $lieu=Lieu::find($creneau->lieu_id)->nom;
        $creneau->creneauphrase="le ".$creneau->jour->jour." à ".$creneau->heure_debut. "h ".$creneau->min_debut. " pendant ".$creneau->duree;
      }
    }
    $jsonAdherents=json_encode ($adherents);
    foreach ($sections as $section){
      $section-> sectGrpe=$section->groupes;
      $section->sectAdh=$section->adherents;
    }
    $jsonSections=json_encode($sections);
    foreach ($creneaux as $creneau){
      $lieu=Lieu::find($creneau->lieu_id)->nom;

      $creneau->creneauphrase="le ".$creneau->jour->jour." à ".$creneau->heure_debut. "h ".$creneau->min_debut. " pendant ".$creneau->duree." au ".$lieu;
    }
    $json=json_encode($creneaux);
    $jsonGroupes=json_encode ($groupes);
    return view('adherent.editRepartition',compact('json','jsonAdherents','jsonSections','jsonGroupes'));
  }

  public function updateRepartition(Request $request){
    if(isset($request->groupe_id)){
      if($request->groupe_id===false||$request->groupe_id==="false"||$request->groupe_id==="0"||$request->groupe_id===0){
       $reponse=false;}
      else
      {
        $reponse=$request->groupe_id;
      }
        Adherent::where('id', $request->id)
          ->update(['groupe_id' =>$reponse]);
      }

    elseif(isset($request->creneau_id)){
      if($request->value===false||$request->value==="false"||$request->value==="0"||$request->value===0){
        $adherent=Adherent::find($request->adherent_id);
        $adherent->creneaux()->detach($request->creneau_id);}
      else{
!+98    $adherent=Adherent::find($request->adherent_id);
      }
    }
    return;
  }

  public function editByGroup()
  {
    $groupe=Groupe::find($_POST['groupe_id']);
    $adherents =($groupe->adherents);
    $creneaux = Creneau::orderBy('jour_id')
      ->get();
    return view('adherent.editGroupe', compact('adherents','groupe', 'creneaux'));
  }
  public function editBySection()
  {
    $section=Section::find($_POST['section_id']);
    $adherents =($section->adherents);
    $creneaux = Creneau::orderBy('jour_id')
      ->get();
    return view('adherent.editGroupe', compact('adherents', 'section', 'creneaux'));
  }
  public function editByEntraineur()
  {
    $entraineur=User::find($_POST['id']);
    $groupes =$entraineur->groupes;
    $creneaux = Creneau::orderBy('jour_id')
      ->get();
    return view('adherent.editEntraineur', compact('entraineur', 'groupes', 'creneaux'));
  }
  public function editByCreneau()
  {
    $creneau=Creneau::find($_POST['creneaux_id']);
    $groupes = Groupe::orderBy('section_id')->get();
    $adherents=$creneau->adherents;
    $sections=Section::all();
    return view('adherent.editCreneaux', compact('creneau','adherents', 'sections', 'groupes'));
  }
}
