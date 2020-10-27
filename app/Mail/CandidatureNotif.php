<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CandidatureNotif extends Mailable
{
    use Queueable, SerializesModels;
    
    public $offre;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($offre)
    {
        $this->offre = $offre;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.candidature_notif');
    }
}
