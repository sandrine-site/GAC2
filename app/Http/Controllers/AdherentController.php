<?php

namespace App\Http\Controllers;

use PDF;
use App\Adherent;
use App\Autorisation;
use App\Autorisations;
use App\Creneau;
use App\Groupe;
use App\Http\Requests\AdherentCreateRequest;
use App\Http\Requests\AdherentUpdateGroupeRequest;
use App\MoyenPayement;
use App\Payement;
use App\Remarque;
use App\Section;
use App\Section_adherent;
use App\Telephone;
use App\Tarif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class AdherentController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth',['except' => ['create','index','store']]);
    $this->middleware('grand',['only' => ['delete']]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){

    $adherents = Adherent::orderBy('sexe')->orderBy('nom')->orderBy('prenom')->Paginate(10);
    $moyensPayements=MoyenPayement::all();
    return view('adherent.index', compact('adherents','moyensPayements'));
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $sections = Section::All();
    return view('adherent.inscription', compact('sections'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(AdherentCreateRequest $request)

  {
    $request['nom'] = strtoupper($request['nom']);
    $request['prenom'] = ucfirst($request['prenom']);
    $request['ville'] = strtoupper($request['ville']);
    $request['adresse'] = $request['adresse1'] . "" . $request['adresse2'];
    $request['dateNaissance'] = date_create();
    date_date_set($request['dateNaissance'], $request['date_naissance_A'], $request['date_naissance_M'], $request['date_naissance_J']);
    Adherent::create($request->all());
    $adherent = Adherent::orderBy('id', 'desc')->first();
    $inputTeleUrgen['adherent_id'] = $adherent->id;
    $inputTeleUrgen['numero'] = $request['telUrgence'];
    $inputTeleUrgen['typeTel_id'] = '4';
    Telephone::create($inputTeleUrgen);
    if (isset($request['telephone_adherent']) && $request['telephone_adherent'] !== null) {
      $inputTeleAdherent['adherent_id'] = $adherent->id;
      $inputTeleAdherent['numero'] = $request['telephone_adherent'];
      $inputTeleAdherent['typeTel_id'] = '1';
      Telephone::create($inputTeleAdherent);
    }
    if (isset($request['telephone_Resp1']) && $request['telephone_Resp1'] !== null) {
      $inputTeleResp1['adherent_id'] = $adherent->id;
      $inputTeleResp1['numero'] = $request['telephone_Resp1'];
      $inputTeleResp1['typeTel_id'] = '2';
      Telephone::create($inputTeleResp1);
    }
    if (isset($request['telephone_Resp2']) && $request['telephone_Resp2'] !== null) {
      $inputTeleResp2['adherent_id'] = $adherent->id;
      $inputTeleResp2['numero'] = $request['telephone_Resp2'];
      $inputTeleResp2['typeTel_id'] = '3';
      Telephone::create($inputTeleResp2);
    }
    if (isset($request['entrainement']) && $request['entrainement'] !== null) {
      $inputEntrainement['adherent_id'] = $adherent->id;
      $inputEntrainement['remarque'] = $request['entrainement'];
      $inputEntrainement['typeRq_id'] = '1';
      Remarque::create($inputEntrainement);
    }
    if (isset($request['medicales']) && $request['medicales'] !== null) {
      $inputMedicales['adherent_id'] = $adherent->id;
      $inputMedicales['remarque'] = $request['medicales'];
      $inputMedicales['typeRq_id'] = '2';
      Remarque::create($inputMedicales);
    }
    $inputAutoMedi['ok'] = $request['urgence'];
    $inputAutoMedi['adherent_id'] = $adherent->id;
    $inputAutoMedi['typeAuto_id'] = '1';
    Autorisation::create($inputAutoMedi);

    $inputAutoDepla['ok'] = $request['deplacements'];
    $inputAutoDepla['adherent_id'] = $adherent->id;
    $inputAutoDepla['typeAuto_id'] = '2';
    Autorisation::create($inputAutoDepla);

    $inputAutoMedia['ok'] = $request['media'];
    $inputAutoMedia['adherent_id'] = $adherent->id;
    $inputAutoMedia['typeAuto_id'] = '3';
    Autorisation::create($inputAutoMedia);

    $inputAutoSortie['ok'] = $request['sortie'];
    $inputAutoSortie['adherent_id'] = $adherent->id;
    $inputAutoSortie['typeAuto_id'] = '4';
    Autorisation::create($inputAutoSortie);

    /*Calcul du tarif*/
    $tarifs=Tarif::all();

    if ($request['section_id']==3){
    $tarif2s=$tarifs->whereBetween('id',[2, 4]);
      $tarifmini=$tarif2s->where('anneeMini','<', $request['date_naissance_A']);
      foreach ($tarifmini->where('anneeMax','>=', $request['date_naissance_A']) as $tarif) {
        $tarifLicence = $tarif->prix;

        if ($tarifs->where('temps',$request["heureSemaine"])!='[]'){
                foreach ($tarifs->where('temps', $request["heureSemaine"]) as $tarif) {
                  $tarifCours = $tarif->prix;
                }
              }
              else{
                $tarifCours=0;
              }
      }
    }
    elseif ($request['section_id'] == 1) {
    $tarifLicence=0;
      foreach ($tarifs->where('section_id', 1) as $tarif) {
        $tarifCours = $tarif->prix;
      }}
    else{
          $tarifLicence=0;
      if ($tarifs->where('temps',$request["heureSemaine"])!='[]'){
        foreach ($tarifs->where('temps', $request["heureSemaine"]) as $tarif) {
          $tarifCours = $tarif->prix;
        }
      }
      else{
        $tarifCours=0;
      }
    }

       /*Génération des PDF*/

    $adherentData=[
      "nom"=>strtoupper($request['nom']),
      "prenom"=>ucfirst($request['prenom']),
      "dateNaissance"=> $request['date_naissance_J']."/".$request['date_naissance_M']."/". $request['date_naissance_A'],
      "lieuNaissance"=>$request['lieuNaissance'],
      "sexe"=>$request['sexe'],
      "telephone_adherent" => $request['telephone_adherent'],
      "telephone_Resp1" => $request["telephone_Resp1"],
      "telephone_Resp2" => $request["telephone_Resp2"],
      "adresse" => $request["adresse1"]." ".$request["adresse2"],
      "cp" => $request[ "cp"],
      "ville" => $request["ville"],
      "email1" => $request["email1"],
      "email2" => $request["email2"],
      "section" =>Section::find ($request["section_id"]),
      "entrainement" => $request["entrainement"],
      "heureSemaine" => $request["heureSemaine"],
      "nomUrgence" => $request["nomUrgence"],
      "telUrgence" => $request["telUrgence"],
      "medicales" =>$request["medicales"],
      "urgence"=>$request['urgence'],
      "deplacements"=>$request['deplacements'],
      "media"=>$request['media'],
      "sortie"=>$request['sortie'],
      "age" => getdate ()[ 'year' ] - $request['date_naissance_A'],
      "tarifLicence"=>$tarifLicence,
      "tarifAdhesion"=>$tarifs->find(1)->prix,
      "tarifCours"=>$tarifCours,

    ];

    $pdf = PDF::loadView('pdf.Autorisations',compact('adherentData'))->setPaper('A4', 'portrait');

    $data = ['email' => $request['email1'], 'subject' => 'Inscription','pdf'=>$pdf];
    Mail::send('emails.maill_Inscription', $data, function ($message) use ($data) {
      $message->from('gacgym@hotmail.fr', 'G.A.C.');
      $message->to($data['email'])->subject('Inscription G.A.C');
      $message->cc('gacgym@hotmail.fr');
      $message->attachData($data['pdf']->output(),'inscription.pdf') ;
      $message->attach(storage_path('pdf/questionnaire_de_santé.pdf')) ;
    });

    return redirect('adherent.confirm');

  }

  public function inscriptionPDF(Request $request) {
  $adherent=Adherent::findOrFail($request->id);
    /*Calcul du tarif*/
     $tarifs=Tarif::all();

     if ($adherent['section_id']==3){

     $tarif2s=$tarifs->whereBetween('id',[2, 4]);
       $tarifmini=$tarif2s->where('anneeMini','<', $adherent['dateNaissance']);
       foreach ($tarifmini->where('anneeMax','>=', $adherent['dateNaissance']) as $tarif) {
         $tarifLicence = $tarif->prix;

         if ($tarifs->where('temps',$adherent["heureSemaine"])!='[]'){
                 foreach ($tarifs->where('temps', $adherent["heureSemaine"]) as $tarif) {
                   $tarifCours = $tarif->prix;
                 }
               }
               else{
                 $tarifCours=0;
               }
       }
     }
     elseif ($adherent['section_id'] == 1) {
     $tarifLicence=0;
       foreach ($tarifs->where('section_id', 1) as $tarif) {
         $tarifCours = $tarif->prix;
       }}
     else{
           $tarifLicence=0;
       if ($tarifs->where('temps',$adherent["heureSemaine"])!='[]'){
         foreach ($tarifs->where('temps', $adherent["heureSemaine"]) as $tarif) {
           $tarifCours = $tarif->prix;
         }
       }
       else{
         $tarifCours=0;
       }
     }

    $adherentData=[
          "nom"=>$adherent['nom'],
          "prenom"=>$adherent['prenom'],
          "dateNaissance"=> $adherent['date_naissance'],
          "lieuNaissance"=> $adherent['lieuNaissance'],
          "sexe"=> $adherent['sexe'],
          "telephone_adherent" => $adherent['telephone_adherent'],
          "telephone_Resp1" =>  $adherent["telephone_Resp1"],
          "telephone_Resp2" =>  $adherent["telephone_Resp2"],
          "adresse" => $adherent["adresse"],
      "cp" => $adherent[ "cp"],
           "ville" => $adherent["ville"],
          "email1" => $adherent["email1"],
          "email2" => $adherent["email2"],
          "section" =>Section::find ($adherent["section_id"]),
          "entrainement" => $adherent["entrainement"],
          "heureSemaine" => $adherent["heureSemaine"],
          "nomUrgence" => $adherent["nomUrgence"],
          "telUrgence" => $adherent["telUrgence"],
          "medicales" =>$adherent["medicales"],
          "urgence"=>$adherent['urgence'],
          "deplacements"=>$adherent['deplacements'],
          "media"=>$adherent['media'],
          "sortie"=>$adherent['sortie'],
          "age" => getdate ()[ 'year' ] - date ('Y',strtotime( $adherent->dateNaissance)),
      "tarifLicence"=>$tarifLicence,
           "tarifAdhesion"=>$tarifs->find(1)->prix,
           "tarifCours"=>$tarifCours,
        ];
   $pdf = PDF::loadView('pdf.Autorisations',compact('adherentData'));
   $name = $adherent['nom']."pdf";
    return $pdf->download($name);
 }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Request $request)
  {
    if(isset($request->id)){$id=$request->id;
       }
    else{$id=session()->get('id');}

    $adherent = Adherent::find($id);

    $groupes = Groupe::orderBy('section_id')
      ->get();
    $sections = Section::all();
    $creneaux = Creneau::orderBy('jour_id')
      ->get();
    $moyensPayements=MoyenPayement::all();
    $tarifs=Tarif::all();
    $annee=(date ('Y',strtotime( $adherent->dateNaissance)));
    foreach ($tarifs->where('libele', 'Adhesion GAC') as $tarif) {
      $tarifAdhesion = $tarif->prix;
    }
    if ($adherent->section_id==3){
      $tarifmini=$tarifs->where('anneeMini','<',$annee);

      foreach ($tarifmini->where('anneeMax','>=',$annee) as $tarif) {
        $tarifLicence = $tarif->prix;
      }
    }
    else{
      $tarifLicence="0";
    }
    if ($adherent->section_id == 1) {
      foreach ($tarifs->where('section_id', 1) as $tarif) {
        $tarifCours = $tarif->prix;
      }
    } else {
      if ($tarifs->where('temps', $adherent->heureSemaine)!='[]'){
        foreach ($tarifs->where('temps', $adherent->heureSemaine) as $tarif) {
          $tarifCours = $tarif->prix;
        }
      }
      else{
        $tarifCours=0;
      }
      $adherent->totalpaye=0;
      foreach ($adherent->payements as $payement){
        $adherent->totalpaye=$adherent->totalpaye+$payement->montant;}

    }
    return view('adherent.edit', compact('adherent', 'groupes', 'sections', 'creneaux','tarifAdhesion','tarifLicence','tarifCours','moyensPayements'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function updateDocument()
  {
    foreach ($_GET['adherent'] as $adherent){
      if (isset($_GET['photo'])){
        foreach ($_GET['photo'] as $photo){
          if($photo==$adherent){
            Adherent::where('id',$adherent)
              ->update(['photo'=>1]);
          }
          else{
            Adherent::where('id', $adherent)
              ->update(['photo' => 0]);}
        }
        if (isset($_GET['CertifMedical'])) {
          foreach ($_GET['CertifMedical'] as $CertifMedical) {
            if ($CertifMedical == $adherent) {
              Adherent::where('id', $adherent)
                ->update(['CertifMedical' => 1]);
            } else {
              Adherent::where('id', $adherent)
                ->update(['CertifMedical' => 0]);
            }
          }
        }
        if (isset($_GET['autorisationsRendues'])) {
          foreach ($_GET['autorisationsRendues'] as $autorisationsRendues) {
            if ($autorisationsRendues == $adherent) {
              Adherent::where('id', $adherent)
                ->update(['autorisationsRendues' => 1]);
            } else {
              Adherent::where('id', $adherent)
                ->update(['autorisationsRendues' => 0]);
            }
          }
        }
        if (isset($_GET['RecuDemande'])) {
          foreach ($_GET['RecuDemande'] as $RecuDemande) {
            if ($RecuDemande == $adherent) {
              Adherent::where('id', $adherent)
                ->update(['RecuDemande' => 1]);
            } else {
              Adherent::where('id', $adherent)
                ->update(['RecuDemande' => 0]);
            }
          }
        }
      }
    }
    return redirect('/dossier');
  }

  public function update(Request $request,$id)
  {;
    $adherent=Adherent::findOrFail($id);
    if($request->adresse!=null){
      $adherent->adresse=($request->adresse);}
    elseif ($request->cp != null) {
      $adherent->cp = $request->cp;}
    elseif ($request->ville!= null) {
      $adherent->ville = $request->ville;}
    elseif ($request->email1!= null) {
      $adherent->email1 = $request->email1;}
    elseif ($request->email2 != null) {
      $adherent->email2 = $request->email2;}
    elseif ($request->section != null) {
      $adherent->section = $request->section;}
    elseif ($request->heureSemaine != null) {
      $adherent->heureSemaine = $request->heureSemaine;}
    elseif ($request->urgence!=null){
      $adherent->nomUrgence=$request->urgence; }
    elseif ($request->reduction!=null){
      $adherent->reduction=$request->reduction;}
    $adherent->save();
    if($request->creneau != null){
      $adherent->creneaux()->attach($request->creneau);}
    if ($request->groupe_id!= null) {
      $adherent->groupe_id = $request->groupe_id;}
    $telephones=$adherent->telephones;
    if ($request->telephone_adherent !== null){
      $telephones1=$telephones->where("typeTel_id",1);
      if( $telephones1=='[]'){
        $telephone1=Telephone::create();
        $telephone1->numero = $request->telephone_adherent;
        $telephone1->adherent_id=$adherent->id;
        $telephone1->typeTel_id=1;
        $adherent->telephones()->save($telephone1);
      }
      else
      {
        foreach($telephones1 as $telephone1){
          $telephone1->numero = $request->telephone_adherent;
          Telephone::where("id",$telephone1->id)->update(["numero"=>$request->telephone_adherent]);
        }
      }
    }
    if ($request->telephone_Resp1 != null ) {
      $telephones2=$telephones->where("typeTel_id",2);
      foreach($telephones2 as $telephone2){
        $telephone2->numero = $request->telephone_Resp1;
        Telephone::where("id",$telephone2->id)->update(["numero"=>$request->telephone_Resp1]);
      }
    }
    if ($request->telephone_Resp2 !== null){
      $telephones3=$telephones->where("typeTel_id",3);
      if( $telephones3=='[]'){
        $telephone3=Telephone::create();
        $telephone3->numero = $request->telephone_Resp2;
        $telephone3->adherent_id=$adherent->id;
        $telephone3->typeTel_id=3;
        $adherent->telephones()->save($telephone3);
      }
      else
      {
        foreach($telephones3 as $telephone3)
        {
          $telephone3->numero = $request->telephone_Resp2;
          Telephone::where("id",$telephone3->id)->update(["numero"=>$request->telephone_Resp2]);
        }
      }
    }
    if ($request->telephone_Urgence != null ) {
      $telephones4=$telephones->where("typeTel_id",4);
      foreach($telephones4 as $telephone4) {
        $telephone4->numero = $request->telephone_Urgence;
        Telephone::where("id", $telephone4->id)->update(["numero" => $request->telephone_Urgence]);
      }
    }
    foreach ($adherent->remarques as $remarque){
      if ($request->Rq_entrainement != null && $remarque->typeRq_id == 1) {
        $remarque->remarque = ($request->Rq_entrainement);
        $remarque->typeqRq_id = 1;
        $remarque->id = $remarque->id;
        $remarque->save();
      }
      elseif ($request->Rq_entrainement!= null && $remarque->typeRq_id !== 1) {
        $inputRq['adherent_id'] = $adherent->id;
        $inputRq['remarque'] = $request['Rq_entrainement'];
        $inputRq['typeqRq_id'] = '1';
        Remarque::create($inputRq);
      }
      elseif ($request->Rq_urgence != null && $remarque->typeRq_id == 2) {
        $remarque->remarque = ($request->Rq_urgence);
        $remarque->typeqRq_id = 2;
        $remarque->id = $remarque->id;
        $remarque->save();
      }
      elseif ($request->Rq_urgence != null && $remarque->typeRq_id !== 2) {
        $inputRq['adherent_id'] = $adherent->id ;
        $inputRq['remarque'] = $request['Rq_urgence'];
        $inputRq['typeqRq_id'] = '2';
        Remarque::create($inputRq);
      }
      elseif ($request->Rq_payement != null && $remarque->typeRq_id == 3) {
        $remarque->remarque = ($request->Rq_payement);
        $remarque->typeqRq_id = 3;
        $remarque->id = $remarque->id;
        $remarque->save();
      }
      elseif ($request->Rq_payement != null && $remarque->typeRq_id !== 3) {
        $inputRq['adherent_id'] = $adherent->id;
        $inputRq['remarque'] = $request['Rq_payement'];
        $inputRq['typeqRq_id'] = '3';
        Remarque::create($inputRq);
      }
      elseif ($request->Rq_autres != null && $remarque->typeRq_id == 4) {
        $remarque->remarque = ($request->Rq_autres);
        $remarque->typeqRq_id = 4;
        $remarque->id = $remarque->id;
        $remarque->save();
      }
      elseif ($request->Rq_autres != null && $remarque->typeRq_id !== 3) {
        $inputRq['adherent_id'] = $adherent->id;
        $inputRq['remarque'] = $request['Rq_autres'];
        $inputRq['typeqRq_id'] = '4';
        Remarque::create($inputRq);
      }
    }
    $adherent = Adherent::find($adherent->id);
    $groupes = Groupe::orderBy('section_id')
      ->get();
    $sections = Section::all();
    $creneaux = Creneau::orderBy('jour_id')
      ->get();
    $tarifs=Tarif::all();
    $annee=(date ('Y',strtotime( $adherent->dateNaissance)));
    foreach ($tarifs->where('libele', 'Adhesion GAC') as $tarif) {
      $tarifAdhesion = $tarif->prix;
    }
    if ($adherent->section_id==3){
      $tarifmini=$tarifs->where('anneeMini','<',$annee);

      foreach ($tarifmini->where('anneeMax','>=',$annee) as $tarif) {
        $tarifLicence = $tarif->prix;
      }
    }
    else{
      $tarifLicence="0";
    }
    if ($adherent->section_id == 1) {
      foreach ($tarifs->where('section_id', 1) as $tarif) {
        $tarifCours = $tarif->prix;
      }
    } else {
      if ($tarifs->where('temps', $adherent->heureSemaine)!='[]'){
        foreach ($tarifs->where('temps', $adherent->heureSemaine) as $tarif) {
          $tarifCours = $tarif->prix;
        }
      }
      else{
        $tarifCours=0;
      }}
    $total=0;
    foreach ($adherent->payements as $payement)
    {$total=$total+$payement->montant; }
    $adherent->total=$total;
    $moyensPayements=MoyenPayement::all();

    return view('adherent.edit', compact('adherent', 'groupes', 'sections', 'creneaux','tarifAdhesion','tarifCours','tarifLicence','moyensPayements'));
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Adherent::find ($id)->delete ();
    return redirect(route('accueilAdminEdit'));
  }
}
