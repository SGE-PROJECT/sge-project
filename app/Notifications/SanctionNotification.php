<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SanctionNotification extends Notification
{
    use Queueable;

    public $users;
    public $mensaje;
    public $asesorado;

    public function __construct($users,$asesorado,$mensaje)
    {

        $this->users=$users;
        $this->asesorado=$asesorado;
        $this->mensaje=$mensaje->message;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'object' => "Peticion de cambio de cita",
            'data' => "Hola " . $this->users->name . ", Tu asesorado ".$this->asesorado." pidio un cambio de cita. Debido al siguiente motivo: " . $this->mensaje . "."
        ];
    }
}
