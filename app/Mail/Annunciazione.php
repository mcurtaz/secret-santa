<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Annunciazione extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $annunciazione;
    public $name;
    public $subject;

    public function __construct($annunciazione, $name)
    {
        
        $this -> annunciazione = $annunciazione;
        $this -> name = $name;
        $this -> subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this-> subject($this -> subject)
                    -> view('mail.annunciazione');
    }
}
