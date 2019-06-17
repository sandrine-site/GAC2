<?php

namespace App\Http\Controllers;
use App\Payement;
use App\Adherent;
use App\Tarif;
use App\MoyenPayement;
use Illuminate\Http\Request;

class PayementController extends Controller
{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//        //
//    }

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function store(Request $request)
  {

      Payement::create($request->all());
    session()->flash(
      'id', $request->adherent_id);

    return back();
  }


    public function index()
    {
        $adherents=Adherent::orderBy('nom')->orderBy('prenom')->paginate(20);
      $tarifs=Tarif::all();
      $payements=Payement::all();
      foreach ($adherents as $adherent) {
        $annee = (date('Y', strtotime($adherent->dateNaissance)));
        foreach ($tarifs->where('libele', 'Adhesion GAC') as $tarif) {
          $tarifAdhesion = $tarif->prix;
        }
        if ($adherent->section_id == 3) {
          $tarifmini = $tarifs->where('anneeMini', '<', $annee);
          foreach ($tarifmini->where('anneeMax', '>=', $annee) as $tarif) {
            $tarifLicence = $tarif->prix;
          }
        } else {
          $tarifLicence = "0";
        }
        if ($adherent->section_id == 1) {
          foreach ($tarifs->where('section_id', 1) as $tarif) {
            $tarifCours = $tarif->prix;
          }
        } else {
          if ($tarifs->where('temps', $adherent->heureSemaine) != '[]') {
            foreach ($tarifs->where('temps', $adherent->heureSemaine) as $tarif) {
              $tarifCours = $tarif->prix;
            }
          } else {
            $tarifCours = 0;
          }
        }
      $adherent->montant=($tarifAdhesion+$tarifCours+$tarifLicence)*(1-$adherent->reduction/100);
        $adherent->totalpaye=0;
                      foreach ($adherent->payements as $payement){
                        $adherent->totalpaye=$adherent->totalpaye+$payement->montant;}
      }
      $moyensPayements=MoyenPayement::all();

      return view("tarif.index",compact('adherents','moyensPayements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $payement=Payement::find($request->id);
      if($request->montant!="null") {$montant=$request->montant;}
      else {$montant=$payement->montant;}
      if($request->encaisseMois!="null") {$encaisseMois=$request->encaisseMois;}
      else {$encaisseMois=$payement->encaisseMois;}
      if($request->moyensPayement_id!="null") {$moyensPayement_id=$request->moyensPayement_id;}
      else {$moyensPayement_id=$payement->moyensPayement_id;}
      if($request->numCheque!="null") {$numCheque=$request->numCheque;}
      else {$numCheque=$payement->numCheque;}
      Payement::where('id', $request->id)
        ->update([
          'montant'=>$montant,
          'encaisseMois'=>$encaisseMois,
          'moyensPayement_id'=>$moyensPayement_id,
          'numCheque'=>$numCheque, ]);
      session()->flash(
            'id', $request->adherent_id);
    return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$adherent_id)
    {
      Payement::find ($id)->delete();
      session()->flash(
                       'id', $adherent_id);
              return back ();
    }
}
