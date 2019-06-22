<?php

namespace App\Http\Controllers;

use App\Fonction;
use App\User;
use Illuminate\Http\Request;

class FonctionController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fonctions=Fonction::all();
        $users=User::all();
        $data=['fonctions'=>$fonctions,
            'users'=>$users];
        return json_encode ($data);
    }
}
