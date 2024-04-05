<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification; // Ajusta el namespace según la ubicación real de tu modelo de notificaciones

class Notifications extends Component
{
    public $notificationsToday = [];
    public $selectedTab = 'today';

   
public $date=null;

    

public function render()
{
    $user = Auth::user();

    if ($this->selectedTab === 'today') {
        $this->notificationsToday = $user->notifications()->whereDate('created_at', today())->get();
        $this->date=now()->format('d-m-y');
    } else {
        $this->notificationsToday=$user->notifications()->get();
        $this->date="Todas las notificaciones";
        
    }


    return view('livewire.notifications', [
        'notificationsToday' => $this->notificationsToday,
        'date'=>$this->date,
    ]);
}

public function selectTab($tab)
{
    $this->selectedTab = $tab;
}

public function markAsRead($notificationId)
{
    DB::table('notifications')
        ->where('id', $notificationId)
        ->update(['read_at' => now()]);

    
}

public function delete($notificationId)
{
    DB::table('notifications')->where('id', $notificationId)->delete();

  
}
public function markAsReadAll()
{
  $user = Auth::user()->id;
   DB::table('notifications')->where('notifiable_id', $user)->update(['read_at' => now()]);
}

public function deleteAll()
{
    $user = Auth::user()->id;
    DB::table('notifications')->where('notifiable_id', $user)->delete();
}



   
}
