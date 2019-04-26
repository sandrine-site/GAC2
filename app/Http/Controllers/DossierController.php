<?php

namespace App\Http\Controllers;

use App\Adherent;
use App\Dossier;
use App\Fonction;
use App\Http\Requests\DossierUpdateRequest;
use Illuminate\Http\Request;

class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $adherents = Adherent::orderBy('nom')->orderBy('prenom')->simplePaginate (15);
//        dd($adherents[19]->dossier);
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
    public function update (DossierUpdateRequest $request, $id)
    {
        dd($request);
        Dossier::update ($id, $request->all ());
        $adherents=Adherent::all ();
       return view ('dossier.index', compact ( 'adherents'));
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
