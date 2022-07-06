<?php

namespace App\Notifications;

use App\Models\Demande;
use App\Models\DemandeStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DemandeValide extends Notification
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
                    ->line('Votre demande de document ('. $this->demande->type_document->intitule.') à été validé')
                    ->line('Le document est à présent en cour de traitement');
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
            'event'=>'Demande validé',
            'intitulé'=> $this->demande->type_document->intitule,
            'id'=> $this->demande->id,
            'status'=> DemandeStatus::TRAITEMENT
        ];
    }

    public function toSms($notifiable)
    {
        $payload = [
          //'contact'=> $notifiable->contact,
          'contact'=> '2250565331668',
          'text'=> "Bonjour chère {$notifiable->fullName}, Votre demande de document [{$this->demande->type_document->intitule}]
a été validé.
Le document est à présent en cour de traiement
          "
        ];
        return $payload;
    }
}
