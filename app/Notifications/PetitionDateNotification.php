<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PetitionDateNotification extends Notification
{
    use Queueable;

    protected $users;
    protected $mensaje;

    public function __construct($users,$mensaje)
    {

        $this->users=$users;
        $this->mensaje=$mensaje->message;

    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }


    public function toArray(object $notifiable): array
    {
        return [
            'object' => "Te han aplicado una sancion",
            'data' => "Hola " . $this->users->name . ", tu asesor académico te ha aplicado una sancion por el siguiente motivo: " . $this->mensaje . "."
        ];
    }
}
