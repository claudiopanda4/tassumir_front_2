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
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Tassumir S.A')
                    ->markdown('Email.Email');
                    
    }
}
