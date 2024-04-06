<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class AdvisorySesionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $users;
    public $fecha;
    public $fecha1;
    public $hora;

    public function __construct($users,$fecha)
    {

        $this->users=$users;
        $this->fecha=$fecha;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nueva sesion de asesoria',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        App::setLocale('es');
        // Convertir la fecha a palabras
        $this->fecha1 = Carbon::createFromFormat('Y-m-d', $this->fecha[0])->isoFormat('dddd, D [de] MMMM [de] YYYY');
        $this->hora = Carbon::createFromFormat('H:i', $this->fecha[1])->format('h:i A');
        return new Content(view: 'mails.new-sesion',);
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
