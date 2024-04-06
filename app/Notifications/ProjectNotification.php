<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProjectNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $data;
    protected $recipient;
    /**
     * Create a new notification instance.
     */
    public function __construct($data,$recipient)
    {
        
        $this->data = $data;
        $this->recipient=$recipient;

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

        ->line('Hola, ' . $this->recipient->name . '!') // Suponiendo que 'name' es un campo en el modelo del destinatario
        ->line('Te estamos contactando para informarte sobre...')
        ->action('Ver Detalles', url('/'))
        ->line('Gracias por usar nuestra aplicación.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'object'=>"Envio de Proyecto",
            'data'=>"Hola ".$this->recipient->name ." Tu Proyecto ha sido enviado correctamente a tu Asesor Academico"
           
        ];
    }
}
