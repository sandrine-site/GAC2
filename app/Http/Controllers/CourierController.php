<?php

namespace App\Http\Controllers;
use App\Adherent;
use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Mail;

class CourierController extends Controller
{
    public function sendCourier()
    {
      $adherent = Adherent::find($id);
      Mail::to($adherent)->send(new Mail($adherent));

      if (Mail::failures()) {
           return response()->Fail('Sorry! Please try again latter');
      }else{
           return response()->success('Great! Successfully send in your mail');
         }
    }
}
