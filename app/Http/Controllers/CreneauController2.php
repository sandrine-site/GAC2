<?php

namespace App\Http\Controllers;

use App\Creneaux_users;
use App\Http\Requests\CreneauCreateRequest;
use App\Creneau;
use App\Jours;
use App\Lieux;
use App\User;
use Illuminate\Http\Request;

class CreneauController extends Controller
{
    public function __construct()
    {
//        $this->middleware('administrateur');
//        $this->middleware('grand');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creneaux = Creneau::All ();
        $UserCreneaux=Creneaux_users::All();
        $jours=Jours::All();
        $lieux=Lieux::All();
        $entraineurs=User::All();
        foreach ($creneaux as $creneau){
            foreach ($UserCreneaux as $UserCreneau){
                if($creneau->id===$UserCreneau->creneaux_id){
                   $user=User::find($UserCreneau->user_id)->name;
            $users[]=$user;
                }
            }
            $creneau['name']=$users;
            }
        return view ('creneau.index',compact('creneaux','jours','lieux','entraineurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreneauCreateRequest $request)
    {
        Creneau::create($request->all());
        $creneaux = Creneau::orderBy('id','desc')->first();

foreach ($request as $requests)

if(isset($requests->entraineur_id)){
    dd($creneaux->id);
        {  $imput=[
                'creneaux_id'=>$creneaux->id,
                'user_id'=>$requests->entraineur_id
            ];
            Creneaux_users::create($imput);}}


        return redirect ('creneau')->withOk("Le creneau a bien été crée.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Creneau::find ($id)->delete();
        return back ();
    }

}
