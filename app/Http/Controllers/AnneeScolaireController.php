<?php

namespace App\Http\Controllers;

use App\Adherent;
use App\Creneau;
use App\Fonction;
use App\Groupe;
use App\Payement;
use App\Remarque;
use App\Section;
use App\Tarif;
use App\Telephone;



class AnneeScolaireController extends Controller
{
  public function __construct()
  {
    $this->middleware('grand');

  }



  public function create()
  {
    $adherents = Adherent::orderBy('nom')->orderBy('prenom')->paginate(20);

    return view("anneeScolaire.edit",compact('adherents'));
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   *
   * @return \Illuminate\Http\Response
   */

  public function destroy()
  {
    Adherent::truncate();
    Autorisation::truncate();
    Creneau::truncate();
    Dossier::truncate();
    Fonction::truncate();
    Groupe::truncate();
    Payement::truncate();
    Remarque::truncate();
    Telephone::truncate();

  }



}
