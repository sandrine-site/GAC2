<?php

namespace App\Http\Controllers;

use App\Fonction;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\Http\Requests\FonctionRequest;



class UserController extends Controller
{

    protected $nbPerPage=8;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('grand',['except' => ['edit']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users=User::paginate(10);
        $links=$users->links();

        return view ('user.index',compact('users','links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fonctions=Fonction::all();
        return view('user.create',compact ('fonctions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {

        $request['telephone']=preg_replace('/[^0-9]/', '',$request['telephone']);
        User::create ($request->all());

        return redirect ('user')->withOk("L'utilisateur".$request['name'].' '.$request['prenom'].'  a bien été crée.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $a=$adherents[0];
//        echo $a->id;
//        $t=$a->telephones;
//        foreach ($t as $tel)
//        {
//            echo($tel->telephone_adherent);
//        }
//        dd($t);
        $user=$this->UserRepository->getById($id);
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $request['telephone']=preg_replace('/[^0-9]/', '',$request['telephone']);
        $this->UserRepository->update($id,$request->all ());

        return redirect ('user')->withOk("L'utilisateur  a bien été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return back ();
    }

}
