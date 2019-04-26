<?php

namespace App\Http\Controllers;

use App\Adherent;
use App\AnneeScolaire;
use App\Creneau;
use App\Fonction;
use App\Groupe;
use App\Http\Requests\AnneeScolaireCreateRequest;
use App\Payement;
use App\Remarque;
use App\Repositories\Annee_scolaireRepository;
use App\Repositories\UserRepository;
use App\Section;
use App\Tarif;
use App\Telephone;
use App\User;
use Illuminate\Http\Request;

class AnneeScolaireController extends Controller
{
    public function __construct()
    {
//            $this->middleware('Grand');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annee=AnneeScolaire::orderBy('id','desc')->first();
        return view ('anneeScolaire.index',compact ('annee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnneeScolaireCreateRequest $request)
    {

        AnneeScolaire::create ($request->all());
           return redirect ('anneeScolaire')->withOk("l'année scolaire a bien été modifiée.");
    }
    public function create()
    {
        $adherents=Adherent::all ();
        $anneeScolaire=AnneeScolaire::all();
        $creneau=Creneau::all();
        $fonctions=Fonction::all();
        $groupe=Groupe::all ();
        $payement=Payement::all ();
        $remarque=Remarque::all ();
        $section=Section::all ();
        $tarif=Tarif::all ();
        $telephone=Telephone::all ();
        $users=User::all();
        $data=['adherent'=>$adherents,
            'annee scolaire'=>$anneeScolaire,
            'creneaux'=>$creneau,
            'fonctions'=>$fonctions,
            'groupe'=>$groupe,
            'payement'=>$payement,
            'remarque'=>$remarque,
            'section'=>$section,
            'tarif'=>$tarif,
            'telephone'=>$telephone,
            'users'=>$users];

        return json_encode ($data);
    }



}
