<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarif;
use App\Section;
class TarifController extends Controller
{
  public function __construct()
      {

        $this->middleware('grand');
        $this->middleware('administrateur');
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarifs=Tarif::all();
        $sections=Section::all();
      return view ('tarif.edit',compact('tarifs','sections'));
    }
  /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function calcul()
     {
       $tarifs=Tarif::all();
       $sections=Section::all();

       if ($_POST!=[] ) {

         foreach ($tarifs->where('libele', 'Adhesion GAC') as $tarif) {
           $tarifAdhesion = $tarif->prix;
         }
         if ($_POST['section_id']==3){

           $tarifmini=$tarifs->where('anneeMini','<',$_POST['annee']);

         foreach ($tarifmini->where('anneeMax','>=',$_POST['annee']) as $tarif) {
                      $tarifLicence = $tarif->prix;
                    }
            }
         else{
         $tarifLicence="0";
         }
         if ($_POST['section_id'] == 1) {
           foreach ($tarifs->where('section_id', 1) as $tarif) {
             $tarifCours = $tarif->prix;
           }
         } else {
         if ($tarifs->where('temps', $_POST["heureSemaine"])!='[]'){
           foreach ($tarifs->where('temps', $_POST["heureSemaine"]) as $tarif) {
             $tarifCours = $tarif->prix;
           }
           }
           else{
           $tarifCours=0;
           }
         }
         $tempsEcrit=$_POST['heureSemaine'];
         $sectionEcrit=Section::find($_POST['section_id'])->nom;
         return view ('tarif.calcul',compact('tarifs','sections','tarifCours', 'tarifAdhesion','tarifLicence','tempsEcrit','sectionEcrit'));}
       return view ('tarif.calcul',compact('tarifs','sections'));
     }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tarif::create($request->all());
            return back ();
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
    public function update(Request $request)
    {
      Tarif::findOrFail($request->id)->update($request->all());
      $tarifs=Tarif::all();
      $sections=Section::all();
      return back ();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Tarif::destroy($id);
              return back ();
    }
}
