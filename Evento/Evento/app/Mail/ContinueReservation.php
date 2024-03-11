<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContinueReservation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($reservation, $user, $event)
    {
        $this->reservation = $reservation;
        $this->user = $user;
        $this->event = $event;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->view('emails.continue')
            ->subject('Confirmation de votre réservation - Procédez au paiement pour confirmer votre participation !')
            ->with(['reservation' => $this->reservation, 'user' => $this->user, 'event' => $this->event]);
        ;
    }
}
