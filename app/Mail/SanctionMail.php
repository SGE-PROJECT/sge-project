<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SanctionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $users;
    public $mensaje;
    public $asesorado;

    public function __construct($users,$asesorado,$mensaje)
    {

        $this->users=$users;
        $this->asesorado=$asesorado;
        $this->mensaje=$mensaje->message;

    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Peticion de cambio de cita',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.request',
        );
    }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
