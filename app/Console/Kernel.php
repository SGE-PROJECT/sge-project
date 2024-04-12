<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Mail\AdvisorySesionMail;
use Illuminate\Support\Facades\Mail;
use App\Notifications\AdvisorySesionNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DateRequestNotification;
use App\Mail\DateRequestMail;
use App\Models\AdvisorySession;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command("Hola")->everyMinute();
        $schedule->call(function () {
            $today = Carbon::today();
            $sessions = AdvisorySession::whereDate('session_date', $today)->get();

            foreach ($sessions as $session) {
                $project = $session->project;
                $date = $session->session_date->toDateTimeString(); // Obtener la fecha y hora de la sesión
                $users = $project->students->pluck('user');

                Notification::send($users, new AdvisorySesionNotification($users, $date));

                foreach ($users as $user) {
                    Mail::to($user->email)->send(new AdvisorySesionMail($user, $date));
                }
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
