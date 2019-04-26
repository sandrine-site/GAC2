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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        back ();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
