<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationWidget extends Component
{
    public $notifications = null;

    public function mount()
    {
        $this->notifications = auth()->user()->unreadNotifications;
    }

    public function markAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
    }

    public function render()
    {

        return view('livewire.notification-widget');
    }
}
