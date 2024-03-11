<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketReservation extends Mailable
{
    use Queueable, SerializesModels;

    private $event;
    private $user;
    private $pdfPath;

    /**
     * Create a new message instance.
     */
    public function __construct($event, $user, $pdfPath)
    {
        $this->event = $event;
        $this->user = $user;
        $this->pdfPath = $pdfPath;
    }

    public function build()
    {
        return $this->view('emails.ticket')
            ->subject('Votre réservation a été confirmée avec succès!')
            ->with('event', $this->event, 'user', $this->user)
            ->attach($this->pdfPath, [
                'as' => 'ticket_' . $this->event->id . '.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
