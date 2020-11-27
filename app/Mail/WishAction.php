<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WishAction extends Mailable
{
    use Queueable, SerializesModels;

    public $wish;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($wish, $subject)
    {
        $this -> wish = $wish;
        $this -> subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this -> subject($this -> subject)
                        -> view('mail.wishmail');
    }
}
