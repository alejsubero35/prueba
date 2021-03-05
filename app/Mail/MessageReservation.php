<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReservation extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Reservación Confirmada';

    public $reservation;
    public $user;

    public function __construct($mail)
    {
        $this->reservation  = $mail['reservation'];
        $this->user         = $mail['user'];
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $send = $this->subject( $this->subject )
                ->to( $this->user->email)
                ->view('emails.message-reservation');
        
        return $send;
    }
}
