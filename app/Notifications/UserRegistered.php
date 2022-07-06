<?php

namespace App\Notifications;

use App\Mail\UserRegisterMail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class UserRegistered extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail',SMSChanel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new UserRegisterMail())
                    ->line('Salut Mr '. $notifiable->fullName)
                    ->line('Bienvenue sur la plateforme de declaration du ministère!')
                    ->action('Notification Action', url('/'))
                    ->line('Code usager: '. strtoupper(Str::random(8)) );
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toSms($notifiable)
    {
        $text = `Salut Mr {$notifiable->fullName}, Bienvenue sur la chaine votre OTP est ${ rand(10000, 99999)}`;

        return [
            'contact'=> $notifiable->contact,
            'text'=> $text
        ];
    }
}
