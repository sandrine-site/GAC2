<?php

namespace App\Http\Controllers;

use App\Adherent;
use App\Dossier;
use Illuminate\Http\Request;

class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adherents = Adherent::orderBy('nom')->orderBy('prenom')->paginate(20);
        foreach ($adherents as $adherent){
            $adherent->remarques;}
        $json=json_encode ($adherents);
        return view('dossier.index', compact('adherents','json'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dossier = Dossier::find($id);
        $adherent = Adherent:: find($dossier->adherent_id);
        return view('dossier.edit', compact('adherent', 'dossier'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
  public function update(Request $request)
  {        if(isset($request->photo)){
    $variable= $request->photo xor $request->photo ;
    Adherent::where('id', $request->id)
      ->update(['photo' =>$variable]);}
    if(isset($request->autorisationsRendues)){
      $variable= $request->autorisationsRendues xor $request->autorisationsRendues ;
      Adherent::where('id', $request->id)
        ->update(['autorisationsRendues' => $variable]);}
    if( isset($request->CertifMedical)){
      $variable= $request->CertifMedical xor $request->CertifMedical ;
      Adherent::where('id', $request->id)
        ->update(['CertifMedical' => $variable]);}
    if(isset($request->RecuDemande)){
      $variable= $request->RecuDemande xor $request->RecuDemande ;

      Adherent::where('id', $request->id)
        ->update(['RecuDemande' => $variable]);
    }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
