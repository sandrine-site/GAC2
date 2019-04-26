<?php

namespace App\Http\Controllers;

use App\Adherent;
use App\Creneau;
use App\Groupe;
use App\Http\Requests\GroupeUpdateRequest;
use App\Section;
use App\User;
use Illuminate\Http\Request;


class GroupeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $groupes = Groupe::all ();
        $adherents = Adherent::orderBy ('dateNaissance', 'desc')
            ->simplePaginate (15);
        $links = $adherents->render ();
        $users = User::where ('fonction_id', '4')
            ->orderBy ('prenom')
            ->get ();
        $sections = Section::all ();
        return view ('groupe.edit', compact ('groupes', 'adherents', 'users', 'links', 'sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
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
    public function store (Request $request)
    {
        Groupe::create ($request->all ());
        $groupe = Groupe::orderBy ('id', 'desc')->first ();
        $groupe->users ()->attach (array ( $request[ 'user_id' ] ));

        return redirect ('groupe')->withOk ("Le groupe a bien été crée.");
    }
    /**
     * add a new adherent created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {


    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
    {
        $groupes = Groupe::all ();
        $adherentsAll = Adherent::orderBy ('dateNaissance')
            ->get ();
        $adherentSections = $adherentsAll->groupBy ('section');
        $adherents = $adherentSections->groupBy ('groupe')->paginate ($n);
        $users = User::where ('fonction_id', '4')
            ->orderBy ('prenom')
            ->get ();
        $sections = Section::all ();
        $adherentsGroupe = Adherent::where ('groupe_id', $id)
            ->orderBy ('nom')
            ->get ();
        return view ('groupe.edit', compact ('groupes', 'adherents', 'users', 'sections', 'adherentsGroupe'));
    }

       /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        Groupe::find ($id)->delete ();
        return back ();
    }
}
