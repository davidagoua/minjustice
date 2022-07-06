<?php

namespace App\Notifications;

use App\Models\Demande;
use App\Models\DemandeStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DemandeTerminee extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public Demande $demande)
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
        return ['mail', SMSChanel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting("Bonjour Chère ". $notifiable->fullName)
            ->line('Votre demande de document ('. $this->demande->type_document->intitule.') est terminer')
            ->line('vous pouvez le télécharger ici')
            ->line('Ou le retrouvez dans votre juridiction');
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
            'event'=>'Demande terminé',
            'intitulé'=> $this->demande->type_document->intitule,
            'id'=> $this->demande->id
        ];
    }

    public function toSms($notifiable)
    {
        return [
            //'contact'=> $notifiable->contact,
            'contact'=> '2250565331668',
            'text'=> "Bonjour chère {$notifiable->fullName}, Votre demande de document [{$this->demande->type_document->intitule}]
           est terminé.
           Vous pouvez télécharger le document ou le retrouver dans votre juridiction
          "
        ];
    }
}
