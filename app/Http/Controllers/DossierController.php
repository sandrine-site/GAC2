<?php

namespace App\Http\Controllers;

use App\Adherent;
use App\Dossier;
use App\Fonction;
use App\Http\Requests\DossierRequest;
use Illuminate\Http\Request;
use App\Repositories\DossierRepository;

class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $adherents = Adherent::orderBy('nom')->orderBy('prenom')->get();

//        $dossiers=Dossier::orderBy('adherent_id->$nom')->simplePaginate (15);
//        $links = $dossiers->links ();
//        $dossiers = Dossier::all ();

        return view ('dossier.index', compact ( 'adherents'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
Dossier::create ($request->all());
return back()->withOk('le dossier a bien été modifié');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
    {
        $dossier = Dossier::find ($id);
        $adherent = Adherent:: find ($dossier->adherent_id);
        return view ('dossier.edit', compact ('adherent', 'dossier'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update ($id)
    {
        $input=['certifMedical'=>$_POST['certifMedical'],
            'photo'=>$_POST['photo'],
            'autorisationsRendues'=>$_POST['autorisationsRendues'],
            'payementOk'=>$_POST['payementOk'],
            'adherent_id'=>Dossier::find($id)->adherent_id,
            'recuDemande'=>$_POST['recuDemande'],
        ];
        Dossier::find($id)->update ($input);
       return back ();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        //
    }
}
