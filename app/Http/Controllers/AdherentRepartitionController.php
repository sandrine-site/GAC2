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
use Illuminate\Http\Request;

class AdherentRepartitionController extends Controller
{
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
        foreach ($adherent->creneaux as $creneau){
            $adherent->adherentCre ="le ".$creneau->jour->jour." à ".$creneau->heure_debut. "h ".$creneau->min_debut. " pendant ".$creneau->duree." ";}
            $adherent->adherentgrp=$adherent->groupe;
            $adherent->adherentsect= $adherent->section;
            $adherent->dateNaissance=strftime("%d/%m/%G", strtotime($adherent->dateNaissance));

        }

        $jsonAdherents=json_encode ($adherents);

        foreach ($sections as $section){
            $section-> sectGrpe=$section->groupes;
            $section->sectAdh=$section->adherents;
        }
        $jsonSections=json_encode($sections);


        foreach ($creneaux as $creneau){
            $creneau->creneauphrase="le ".$creneau->jour->jour." à ".$creneau->heure_debut. "h ".$creneau->min_debut. " pendant ".$creneau->duree;
        }
        $json=json_encode($creneaux);
        $jsonGroupes=json_encode ($groupes);
        return view('adherent.editRepartition',compact('json','jsonAdherents','jsonSections','jsonGroupes'));
    }

    public function updateRepartition()
    {
        dd($_GET);
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
