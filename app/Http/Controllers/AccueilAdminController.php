<?php

namespace App\Http\Controllers;


use App\Adherent;
use App\Autorisation;
use App\Dossier;
use App\Groupe;
use App\Licence;
use App\Payement;
use App\Remarque;
use App\Section;
use App\Telephone;

class AccueilAdminController extends Controller
{
  /**
      * Create a new controller instance.
      *
      * @return void
      */
     public function __construct()
     {


      $this->middleware('auth');

     }


    public function index()
    {
       $adherents = Adherent::orderBy('section_id')->orderBy('groupe_id')->orderBy('nom')->orderBy('prenom')->paginate(10);
       return view('adherent.liste',compact('adherents'));

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editAccueil()
    {

       if (isset($_POST['nom'])){
           $adherent=Adherent::all()->where('id',$_POST['nom']);
           $autorisations=Autorisation::all()->where('adherent_id',$_POST['nom']);
           $remarques=Remarque::all()->where('adherent_id',$_POST['nom']);
           $telephones=Telephone::all()->where('adherent_id',$_POST['nom']);
           $section=Section::all();
          $licence=Licence::all()->where('adherent_id',$_POST['nom']);
           $dossier=Dossier::all()->where('adherent_id',$_POST['nom']);
           $payements=Payement::all ()->where('adherent_id',$_POST['nom']);
           $groupes=Groupe::all ()->where('groupe_id',$_POST['nom']);
       }

       return view ('adherent.edit',compact('adherent','autorisations','remarques','telephones','section','dossier','licence','payements','groupes'));
    }


}
