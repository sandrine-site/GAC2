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
        $adherent=Adherent::orderBy('dateNaissance')->paginate(10);
        $sections=Section::all();
        $groupes=Groupe::all();
        $creneaux=Creneau::all();
        return view('adherent.editRepartition',compact('adherent','sections','groupes','creneaux'));
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
