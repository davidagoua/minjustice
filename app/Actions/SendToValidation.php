<?php

namespace App\Actions;

use App\Models\Demande;
use App\Models\DemandeStatus;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Lorisleiva\Actions\Concerns\AsAction;

/*
 *
 * 'certificate-of-nationality' => [
            'person.address' => ['required', 'max:255'],
            'person.birth_place' => ['required', 'max:255'],
            'father.name' => ['required', 'max:255'],
            'father.birth_place' => ['required', 'max:255'],
            'father.birth_at' => ['required', 'date'],

            'mother.name' => ['required', 'max:255'],
            'mother.birth_place' => ['required', 'max:255'],
            'mother.birth_at' => ['required', 'date']
        ]
 *
 */

class SendToValidation
{
    use AsAction;
    public User $user;
    public Demande $demande;

    public function send()
    {

        $base_url = "http://imprimerie.local";
        $res = Http::withHeaders([
            'Accept'=> 'application/json'
        ])
        ->post("$base_url/api/documents", [
            'type'=>[
                'model'=>  'certificate-of-nationality',
                'tag'=> $this->demande->type_document->tag,
            ],
            'id'=> auth()->Id(),
            'data'=> [
                'person'=>[
                    'address'=> $this->user->ville .', '.$this->user->quartier,
                    'birth_place'=> $this->user->lieu_naissance,
                    'birth_at'=> $this->user->date_naissance,
                    'civil_status'=> $this->user->situation_matrimonial,
                    'profession'=> null,
                    'nationality'=> 'IVOIRIENNE',
                    'firstname'=> $this->user->first_name,
                    'lastname'=>$this->user->last_name,
                ],
                'father'=>[
                    'firstname'=>$this->user->first_name_pere,
                    'lastname'=>$this->user->last_name_pere,
                    'birth_at'=>$this->user->date_naissance_pere,
                    'birth_place'=> $this->user->lieu_naissance_pere
                ],
                'mother'=>[
                    'firstname'=>$this->user->first_name_mere,
                    'lastname'=>$this->user->last_name_mere,
                    'birth_at'=>$this->user->date_naissance_mere,
                    'birth_place'=> $this->user->lieu_naissance_mere
                ],
            ],
            'certificates'=>[],
            "hall"=>1,
            'request'=> $this->demande->id,
        ]);
        if($res->status() == 200){
            $this->demande->setStatus(DemandeStatus::VALIDATION);
        }
    }

    public function handle(User $user, Demande $demande)
    {
        $this->user = $user;
        $this->demande = $demande;
        $this->send($user, $demande);
    }
}
