<?php

namespace App\Http\Controllers;


use App\Adherent;
use App\Autorisation;
use App\Creneau;
use App\Groupe;
use App\Section;

class AutorisationController extends Controller
{

    /*
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    public function update()
    {

        $autorisation = Autorisation::where('id', $_GET['id'])->get();
        foreach ($autorisation as $autorisation) {
            if ($autorisation->ok == 1) {
                $autorisation->ok=0;
            } else {
                $autorisation->ok=1;
            }
            Autorisation::where('id', $_GET['id'])->update(['ok'=>$autorisation->ok]);
        }
        $adherent = Adherent::find($_GET['adherent_id']);
        $groupes = Groupe::orderBy('section_id')
            ->get();
        $sections = Section::all();
        $creneaux = Creneau::orderBy('jour_id')
            ->get();

        return view('adherent.edit', compact('adherent', 'groupes', 'sections', 'creneaux'));
    }
}
