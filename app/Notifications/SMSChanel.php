<?php

namespace App\Notifications;
use App\Actions\SendSMS;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class SMSChanel
{
    public function send($notifiable, Notification $notification)
    {
        $payload = $notification->toSms($notifiable);
        $res = SendSMS::run($payload['contact'], $payload['text']);
        return $res;
    }
}
