<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SanctionAdvisor extends Mailable
{
    use Queueable, SerializesModels;

    public $users;
    public $mensaje;
    public $documentPath;

    public function __construct($users, $mensaje, $documentPath)
    {
        $this->users = $users;
        $this->mensaje = $mensaje->message;
        $this->documentPath = $documentPath;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Haz aplicado una sancion.',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('mails.sactionAdvisor')
                    ->attach($this->documentPath);
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
