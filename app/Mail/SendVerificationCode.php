<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendVerificationCode extends Mailable
{
    use Queueable, SerializesModels;


        public $codHugo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($codHugo)
    {

        $this->codHugo=$codHugo;
        //$hp = $this->dadosEmail;
        //dd($dadosEmail);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('H20 is on all night long')
                    ->markdown('Email.testeEmail');
                    
    }
}
