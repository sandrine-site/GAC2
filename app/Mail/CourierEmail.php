<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CourierEmail extends Mailable
{
    use Queueable, SerializesModels;
  /**
    * The courier instance.
    * @var Courier
    */
    public $courier;
    public $subject;
    public $content;
     /**
      * Create a new message instance.
      *
      * @return void
      */
  public function __construct($subject,$content)
      {

        $this->subject=$subject;
        $this->content=$content;
      }


     /**
      * Build the message.
      *
      * @return $this
      */
     public function build()
     {dd($subject,$content);
         return $this->view('emails.contact')
               ->from('gacgym@hotmail.fr', 'G.A.C.');
                 }
 }
