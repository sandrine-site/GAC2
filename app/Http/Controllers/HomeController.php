<?php

namespace App\Http\Controllers;

use App\Adherent;
use App\Creneau;
use App\Groupe;
use App\Jour;
use App\Section;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    protected $UserRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct ()
    {
        $this->middleware ('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index ()
    {
        $users = User::where ('fonction_id', '4')
            ->orderBy ('prenom')
            ->get ();
        $sections = Section::all ();
        $jours = Jour::all ();
        $creneaux = Creneau::all ();
        $adherents = Adherent::orderBy ('nom')
            ->get ();
        $groupes = Groupe::orderBy ('section_id')
            ->get ();
        return view ('accueilAdmin', compact ('users', 'sections', 'jours', 'creneaux', 'adherents', 'groupes'));
    }

    public function navbar ()
    {
//        $auths=Auth::user ();

    }

}
