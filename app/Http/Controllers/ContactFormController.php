<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\mail\Mailer;
use App\Mail\ContactForm;

class ContactFormController extends Controller
{

  /**
   * Recieve the info in contact form and tranmett tout the mail
   * @param ContactFormRequest $request
   */

  public function send(ContactFormRequest $request){
  $subject="contact : ".$request["sujet"];




       Mail::send('emails.mail_contact',[
       'email' => $request['mail'],
        'subject' =>$request['sujet'],
           'name'=>$request['name'],
           'club'=>$request['club'] ? $request['club']:'false',
           'content'=>$request['content'],
           ],function ($message)use ($subject){
           $message->to('gacgym@hotmail.fr')
                  ->subject($subject);});


return back();

}
}
