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
    if ($request->category == 'tous') {
      $adherents = Adherent::all();
      foreach ($adherents as $adherent) {

        $contactMessage = $request->contenu;
        $contactSubject = strip_tags($request->sujet);
        $contactMail = $adherent->email1;

        $data = ['email' => $contactMail, 'subject' => $contactSubject, 'content' => $contactMessage];
         Mail::queue('emails.contact', $data, function ($message) use ($data) {
          $subject = $data['subject'];

          $message->from('gacgym@hotmail.fr', 'G.A.C.');
          $message->to($data['email'])->subject($subject)
          ;

        });
      }

    } elseif ($request->category == "un") {
      $adherent = Adherent::find($request->choix);
      $contactMessage=$request->contenu;
$contactSubject=strip_tags($request->sujet);
$contactMail=$adherent->email1;

      $data = ['email'=> $contactMail,'subject' => $contactSubject, 'content' => $contactMessage];

      Mail::send('emails.contact',$data,function($message) use ($data) {
$subject=$data['subject'];

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

    if ($request->category =='tous') {
      $adherents = Adherent::all();

      foreach ($adherents as $adherent) {
        $telResp=Telephone::where("adherent_id",$adherent->id)->where("typeTel_id","2");

        $sPhoneNum = '33'.$telResp;
        $aProviders = array('vtext.com', 'tmomail.net', 'txt.att.net', 'mobile.pinger.com', 'page.nextel.com');
        foreach ($aProviders as $sProvider)
        {
            if (mail($sPhoneNum . '@' . $sProvider, '', $request->contenu))
            {
              break;
            }
            else
            {
              continue;
            }
            }
        }}
         elseif ($request->category == "un") {

           $telResps=Telephone::where("adherent_id",$request->choix)->where("typeTel_id","2")->get();
           foreach ($telResps as $telResp){

                   $sPhoneNum = '33'.(int)$telResp->numero;
                   $aProviders = array('vtext.com', 'tmomail.net', 'txt.att.net', 'mobile.pinger.com', 'page.nextel.com');
                   foreach ($aProviders as $sProvider)
                   {
                       if (mail($sPhoneNum . '@' . $sProvider, '', $request->contenu))
                       {
                         break;
                       }
                       else
                       {
                         continue;
                       }
                       }}
                   }

    elseif ($request->category == 'parGroupe') {
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



//Mail::later(1, 'view.courier', function ($message) {
//        $message->from('gacgym@hotmail.fr', 'GAC');
//
//
//        $message->to($message->address);
//
//        $message->subject($message->subject);
//
//
//    });


}}
