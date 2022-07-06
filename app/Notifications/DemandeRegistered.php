<?php

namespace App\Notifications;

use App\Actions\SendSMS;
use App\Mail\DemainRegisteredMail;
use App\Models\Demande;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DemandeRegistered extends Notification
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
        return ['mail','database', SMSChanel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     */
    public function toMail($notifiable)
    {
        return (new DemainRegisteredMail(auth()->user()))->to($notifiable->email);
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
            'event'=>'Demande enrégistrée',
            'intitulé'=> $this->demande->type_document->intitule,
            'id'=> $this->demande->id
        ];
    }

    public function toSms()
    {
        $user = auth()->user();
        $type_doc = $this->demande->type_document->intitule;
        return [
            'contact'=> auth()->user()->contact,
            'text'=> `Bonjour Chèr. {$user->contact} \n Votre demande de {$type_doc} a été enrégistré. Vous serez invité a vous rendre a la juridiction avec les originaux de vos documents`
        ];
    }
}
