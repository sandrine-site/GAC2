<?php

namespace App\Http\Controllers;

use App\Adherent;
use App\Groupe;
use App\Section;
use App\User;
use Illuminate\Http\Request;


class GroupeController extends Controller
{
  public function __construct()
      {
        $this->middleware('auth');
      }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index ()
  {
    $groupes = Groupe::all ();
    $users = User::where ('fonction_id', '4')
      ->orderBy ('prenom')
      ->get ();
    $sections = Section::all ();
    return view ('groupe.index', compact ('groupes', 'users', 'sections'));
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
    $groupe->users()->attach (array ( $request[ 'user_id' ] ));

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

    Groupe::find($_POST['id'])->update ($_POST);
    return redirect ('groupe');
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
    $groupe = Groupe::find($id);
    $users = User::where ('fonction_id', '4')
      ->orderBy ('prenom')
      ->get ();
    $sections = Section::all ();

    return view ('groupe.edit', compact( 'groupe','users','sections'));
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
