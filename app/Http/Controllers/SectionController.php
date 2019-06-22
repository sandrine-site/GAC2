<?php

namespace App\Http\Controllers;


use App\Adherent;
use App\Http\Middleware\Grand;
use App\Http\Requests\SectionCreateRequest;
use App\Section;
use App\Http\Middleware\Administrateur;
use App\Repositories\SectionRepository;
use Illuminate\View\View;


class SectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('administrateur');
        $this->middleware('grand');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sections=Section::All();
               return view ('section.index',compact('sections'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionCreateRequest $request)
    {
        Section::create($request->all());

        return redirect ('section')->withOk("La section ".$request['section'].'  a bien été crée.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Section::find ($id)->delete();
        return back ();
    }

}
