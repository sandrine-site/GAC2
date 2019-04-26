<?php

namespace App\Http\Controllers;

use App\Creneau_User;
use App\Creneaux_users;
use App\Http\Requests\CreneauCreateRequest;
use App\Creneau;
use App\Jour;
use App\Jours;
use App\Lieu;
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

        $creneaux = Creneau::paginate(10);
        $creneaux_users=Creneau_User::all();
        $jours=Jour::all ();
        $lieux=Lieu::all ();
        $users=User::all ();
        return view ('creneau.index',compact('creneaux','creneaux_users','jours','lieux','users'));
    }
    public function create()
    {
        $jours=Jour::all ();
        $lieux=Lieu::all ();
        $users=User::all ();
        return view ('creneau.create',compact('jours','lieux','users'));
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
            $creneaux->users()->attach(array ($request['user_id']));
        return redirect ('creneau')->withOk("Le creneau a bien été crée.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $creneau=Creneau::findOrFail($id);
        $jours=Jour::all ();
        $lieux=Lieu::all ();
        $users=User::all ();

        return view ('creneau.edit',compact('creneau','jours','lieux','users'));
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
