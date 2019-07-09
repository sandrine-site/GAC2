<?php

namespace App\Mail;
use App\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactForm extends Mailable
{
  /**
      * Elements de contact
      * @var array
      */
     public $contact;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactForm $contact)
    {
        $this->contact=$contact;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->
        view('emails.maill_contact')
      ->from($data['email'], 'G.A.C')
      ->text('emails.maill_contact_text')
      ->to('gacgym@hotmail.fr')
      ->subject($data['subject']);

    }
}


