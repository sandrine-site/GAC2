<?php

namespace App\Http\Controllers;

use App\Adherent;

use App\Creneau;
use App\Groupe;
use App\Lieu;
use App\Section;
use App\Section_adherent;
use App\Telephone;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Courier;
use App\send;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CourierController;
use App\Mail\CourierEmail;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class AdherentContactController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');

  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request){

    $adherents = Adherent::orderBy('nom')->orderBy('prenom')->get();
    foreach($adherents as $adherent) { $adherent->text=$adherent->nom." ".$adherent->prenom;}
    $groupes=Groupe::all();
    foreach($groupes as $groupe){
        $groupe->text=$groupe->nom;}
    $sections=Section::all();
    foreach($sections as $section){
      $section->text=$section->nom;}
    $entraineurs=User::where("fonction_id",4)->get();
    foreach($entraineurs as $entraineur){
      $entraineur->text=$entraineur->prenom;}
    $creneaux=Creneau::all();
    foreach ($creneaux as $creneau){
          $lieu=Lieu::find($creneau->lieu_id)->nom;

          $creneau->text="le ".$creneau->jour->jour." à ".$creneau->heure_debut. "h ".$creneau->min_debut. " pendant ".$creneau->duree." au ".$lieu;
        }
    $jsonAdherents=json_encode($adherents);
    $jsonGroupes=json_encode($groupes);
    $jsonSections=json_encode($sections);
    $jsonEntraineurs=json_encode($entraineurs);
    $jsonCreneaux=json_encode($creneaux);

if ($request->mail=='1'){
    return view('indexMail', compact('jsonAdherents','jsonGroupes','jsonSections','jsonEntraineurs','jsonCreneaux'));}
  elseif ($request->sms=='1'){
    return view('indexSMS', compact('jsonAdherents','jsonGroupes','jsonSections','jsonEntraineurs','jsonCreneaux'));}
  }

  public function create(Request $request)
  {
    $contactMessage=$request->contenu;
    $contactSubject=strip_tags($request->sujet);

    if ($request->category == 'tous') {
      $adherents = Adherent::all();
      foreach ($adherents as $adherent) {
        $contactMail=$adherent->email1;
             $data = ['email'=> $contactMail,'subject' => $contactSubject, 'content' =>strip_tags($contactMessage)];

             Mail::send('emails.contact',$data,function($message) use ($data) {
               $subject=$data['subject'];
               $content=$data['content'];
               $message->from('gacgym@hotmail.fr', 'G.A.C.');
               $message->to($data['email'])->subject($subject);
             });
      }
    }elseif ($request->category == "un") {
      $adherent = Adherent::find($request->choix);
      $contactMail=$adherent->email1;
      $data = ['email'=> $contactMail,'subject' => $contactSubject, 'content' =>strip_tags($contactMessage)];
      Mail::send('emails.contact',$data,function($message) use ($data) {
        $subject=$data['subject'];
        $content=$data['content'];
        $message->from('gacgym@hotmail.fr', 'G.A.C.');
        $message->to($data['email'])->subject($subject);
      });



//      if (isset($adherent->email2)) {
//        array_push($address, $adherent->email2);
//      }

    } elseif ($request->category == 'parGroupe') {
      $groupe = Groupe::find($request->choix);
      $adherents = $groupe->adherents;
      foreach ($adherents as $adherent) {
        array_push($address, $adherent->email1);
        if (isset($adherent->email2)) {
          array_push($address, $adherent->email2);
        }
      }
    } elseif ($request->category == 'parSection') {
      $section = Section::find($request->choix);
      $adherents = $section->adherents;
    } elseif ($request->category == 'parEntraineur') {
      $creneaux = User::find($request->choix)->creneaux;
      $adherents = $creneaux->adherents;
    } elseif ($request->category == 'parCreneau') {
      $creneau = Creneau::find($request->choix);
      $adherents = $creneau->adherents;
    }

}
public function createSMS(Request $request)
{
  $liste1 = [];
  $liste2 = [];
  $liste3 = [];
  if ($request->category == 'tous') {
    $adherents = Adherent::all();
    foreach ($adherents as $adherent) {
      if ($request->respLegal1 == "respLegal1") {
      $telResps = $adherent->telephones->where("typeTel_id", "2");;
        foreach ($telResps as $telResp) {
          $telResp = $telResp->numero;
          array_push($liste2, $telResp);
        }
      }
      if ($request->respLegal2 == "respLegal2") {
        $telResps = $adherent->telephones->where("typeTel_id", "3");
        foreach ($telResps as $telResp) {
          $telResp = $telResp->numero;
          array_push($liste3, $telResp);
        }
      }
      if ($request->telAdherent == "telAdherent") {
        $telResps = $adherent->telephones->where("typeTel_id", "1");
        foreach ($telResps as $telResp) {
          $telResp = $telResp->numero;
          array_push($liste1, $telResp);
        }
      }
    }
  } elseif ($request->category == 'parSection') {
    $section = Section::find($request->choix);
    $adherents = $section->adherents;

    foreach ($adherents as $adherent) {
      if ($request->respLegal1 == "respLegal1") {
        $telResps = $adherent->telephones->where("typeTel_id", "2");
        foreach ($telResps as $telResp) {
          $telResp = $telResp->numero;
          array_push($liste2, $telResp);
        }
      }
      if ($request->respLegal2 == "respLegal2") {
        $telResps = $adherent->telephones->where("typeTel_id", "3");
        foreach ($telResps as $telResp) {
          $telResp = $telResp->numero;
          array_push($liste3, $telResp);
        }
      }
      if ($request->telAdherent == "telAdherent") {
        $telResps = $adherent->telephones->where("typeTel_id", "1");
        foreach ($telResps as $telResp) {
          $telResp = $telResp->numero;
          array_push($liste1, $telResp);
        }
      }
    }
  } elseif ($request->category == 'parEntraineur') {
    $users = User::find($request->choix);
    $creneaux = $users->creneaux;
    foreach ($creneaux as $creneau) {
      $adherents = $creneau->adherents;
      foreach ($adherents as $adherent) {

        if ($request->respLegal1 == "respLegal1") {
          $telResps = $adherent->telephones->where("typeTel_id", "2");
          foreach ($telResps as $telResp) {
            $telResp = $telResp->numero;
            array_push($liste2, $telResp);
          }
        }
        if ($request->respLegal2 == "respLegal2") {
          $telResps = $adherent->telephones->where("typeTel_id", "3");
          foreach ($telResps as $telResp) {
            $telResp = $telResp->numero;
            array_push($liste3, $telResp);
          }
        }
        if ($request->telAdherent == "telAdherent") {
          $telResps = $adherent->telephones->where("typeTel_id", "1");
          foreach ($telResps as $telResp) {
            $telResp = $telResp->numero;
            array_push($liste1, $telResp);
          }
        }
      }
    }
  } elseif ($request->category == 'parGroupe') {
    $adherentAll = Adherent::all();
    $adherents = $adherentAll->where('groupe_id', $request->choix);
    foreach ($adherents as $adherent) {
      if ($request->respLegal1 == "respLegal1") {
        $telResps = $adherent->telephones->where("typeTel_id", "2");
        foreach ($telResps as $telResp) {
          $telResp = $telResp->numero;
          array_push($liste2, $telResp);
        }
      }
      if ($request->respLegal2 == "respLegal2") {
        $telResps = $adherent->telephones->where("typeTel_id", "3");
        foreach ($telResps as $telResp) {
          $telResp = $telResp->numero;
          array_push($liste3, $telResp);
        }
      }
      if ($request->telAdherent == "telAdherent") {
        $telResps = $adherent->telephones->where("typeTel_id", "1");
        foreach ($telResps as $telResp) {
          $telResp = $telResp->numero;
          array_push($liste1, $telResp);
        }
      }
    }
  } elseif ($request->category == 'parCreneau') {
    $creneau = Creneau::find($request->choix);
    $adherents = $creneau->adherents;
    foreach ($adherents as $adherent) {
      if ($request->respLegal1 == "respLegal1") {
        $telResps = $adherent->telephones->where("typeTel_id", "2");
        foreach ($telResps as $telResp) {
          $telResp = $telResp->numero;
          array_push($liste2, $telResp);
        }
      }
      if ($request->respLegal2 == "respLegal2") {
        $telResps = $adherent->telephones->where("typeTel_id", "3");
        foreach ($telResps as $telResp) {
          $telResp = $telResp->numero;
          array_push($liste3, $telResp);
        }
      }
      if ($request->telAdherent == "telAdherent") {
        $telResps = $adherent->telephones->where("typeTel_id", "1");
        foreach ($telResps as $telResp) {
          $telResp = $telResp->numero;
          array_push($liste1, $telResp);
        }
      }
    }
  } else {
    $adherent = Adherent::find($request->choix);
    if ($request->respLegal1 == "respLegal1") {
      $telResps = $adherent->telephones->where("typeTel_id", "2");
      foreach ($telResps as $telResp) {
        $telResp = $telResp->numero;
        array_push($liste2, $telResp);
      }
    }
    if ($request->respLegal2 == "respLegal2") {
      $telResps = $adherent->telephones->where("typeTel_id", "3");
      foreach ($telResps as $telResp) {
        $telResp = $telResp->numero;
        array_push($liste3, $telResp);
      }
    }
    if ($request->telAdherent == "telAdherent") {
      $telResps = $adherent->telephones->where("typeTel_id", "1");
      foreach ($telResps as $telResp) {
        $telResp = $telResp->numero;
        array_push($liste1, $telResp);
      }
    }
  }
 $divL1=(int)(count($liste1)/10);
 $resteL1=count($liste1)%10;
 $divL2=(int)(count($liste2)/10);
 $resteL2=count($liste2)%10;
 $divL3=(int)(count($liste3)/10);
 $resteL3=count($liste3)%10;
 dd(count($liste1),$divL1,$resteL1,count($liste2),$divL2,$resteL2,count($liste3),$divL3,$resteL3);


return view("numeroSMS",compact('liste1','divL1','resteL1','liste2','divL2','resteL2','liste3',divL3,$resteL3)); }
}
