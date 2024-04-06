<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PetitionDateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $users;
    public $mensaje;

    public function __construct($users,$mensaje)
    {

        $this->users=$users;
        $this->mensaje=$mensaje->message;

    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Te han aplicado una sancion.',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.sanction',
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
