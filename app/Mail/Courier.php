<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Courier extends Mailable
{
    use Queueable, SerializesModels;

  /**
   * The courier instance.
   * @var Courier
   */
   public $courier;
    /**
     * Create a new message instance.
     *
     * @return void
     */
  use Queueable, SerializesModels;
    public function __construct(Courier $courier)
    {
      $this->courier=$courier;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact')
              ->from('gacgym@hotmail.fr', 'G.A.C.')
              ->text($courier->contenu)
              ->subject($courier->sujet);
    }
}
