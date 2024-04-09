<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class AdvisorySesionNotification extends Notification
{
    use Queueable;

    protected $users;
    protected $fecha;

    public function __construct($users,$fecha)
    {

        $this->users=$users;
        $this->fecha=$fecha;

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

     public function toArray($notifiable)
     {
         // Establecer el locale de Carbon a español
        App::setLocale('es');

        // Convertir la fecha a palabras
        $fecha = Carbon::createFromFormat('Y-m-d', $this->fecha[0])->isoFormat('dddd, D [de] MMMM [de] YYYY');
        $hora = Carbon::createFromFormat('H:i', $this->fecha[1])->format('h:i A');

         return [
             'object' => "Nueva sesion de asesoria",
             'data' => "Hola " . $this->users->name . ", tu asesor académico te asignó una nueva sesión de asesoría el día " . $fecha . " a las " . $hora . "."
         ];
     }
}
