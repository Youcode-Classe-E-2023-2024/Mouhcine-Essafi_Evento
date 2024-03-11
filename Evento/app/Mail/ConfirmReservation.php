<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmReservation extends Mailable
{
    use Queueable, SerializesModels;

    private $event;
    private $user;

    /**
     * Create a new message instance.
     *
     * @param $event
     */
    public function __construct($event, $user)
    {
        $this->event = $event;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.confirmReservation')
            ->subject('Nouveau demande de reservation!')
            ->with('event', $this->event, 'user',  $this->user);
    }
}
