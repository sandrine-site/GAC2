<?php

namespace App\Http\Controllers;

use App\Adherent;
use App\Dossier;
use Illuminate\Http\Request;

class DossierController extends Controller
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
  public function index()
  {
    $adherents = Adherent::orderBy('nom')->orderBy('prenom')->paginate(20);
    foreach ($adherents as $adherent){
      $adherent->remarques;}
    $json=json_encode ($adherents);
    return view('dossier.index', compact('adherents','json'));
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
  public function update(Request $request){

$adherent=Adherent::findOrFail($request->id);
    if(isset($request->autorisationsRendues)){
      $variable= $request->autorisationsRendues?1:0;
      $adherent->autorisationsRendues=$variable;
    }
    if(isset($request->photo)){
      $variable= $request->photo?1:0;
      $adherent->photo=$variable;
    }
    if( isset($request->CertifMedical)){
      $variable= $request->CertifMedical?1:0;
      $adherent->CertifMedical=$variable;
    }

    if( isset($request->RecuDemande)){
      $variable= $request->RecuDemande?1:0;
      $adherent->RecuDemande=$variable;
    }
    $adherent->save();

    return back();
  }


}
