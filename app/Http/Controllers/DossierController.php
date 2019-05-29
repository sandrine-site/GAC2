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
    {

        if(isset($request->photo)){
        if($request->photo===true||$request->photo==="true"||$request->photo=="1"||$request->photo==1){
            Adherent::where('id', $request->id)
                ->update(['photo' => true]);}
        else{Adherent::where('id', $request->id)
            ->update(['photo' => false]);}}
            if(isset($request->autorisationsRendues)){
        if($request->autorisationsRendues===true||$request->autorisationsRendues==="true"||$request->autorisationsRendues=="1"||$request->autorisationsRendues==1){
            Adherent::where('id', $request->id)
                ->update(['autorisationsRendues' => true]);}
        else{Adherent::where('id', $request->id)
            ->update(['autorisationsRendues' => false]);}}
           if( isset($request->CertifMedical)){
        if($request->CertifMedical===true||$request->CertifMedical==="true"||$request->CertifMedical=="1"||$request->CertifMedical==1){
            Adherent::where('id', $request->id)
                ->update(['CertifMedical' => true]);}
        else{Adherent::where('id', $request->id)
            ->update(['CertifMedical' => false]);}}
               if(isset($request->RecuDemande)){
        if($request->RecuDemande==true||$request->RecuDemande=="true"||$request->RecuDemande=="1"||$request->RecuDemande==1){
            Adherent::where('id', $request->id)
                ->update(['RecuDemande' => true]);}
        else{Adherent::where('id', $request->id)
            ->update(['RecuDemande' => false]);
        }}
        return back('id'=>$request->id) ;
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
