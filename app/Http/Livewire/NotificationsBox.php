<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationsBox extends Component
{
    public $notifications = [];

    public function mount()
    {
        $this->updateNotifications();
    }

    public function render()
    {
        return view('livewire.notifications-box');
    }

    public function updateNotifications() {
        $this->notifications = Notification::where('user_id', Auth::user()->id)
        ->where('viewed', false)
        ->orderBy('created_at')
        ->limit(10)->get();
    }

    public function onCloseButton($notificationId) {
        $notification = Notification::find($notificationId);
        $notification->viewed = 1;
        $notification->save();
        $this->updateNotifications();
    }
}
