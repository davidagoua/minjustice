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





class SendCasierToValidation
{
    use AsAction;
    public User $user;
    public Demande $demande;
    public array $path;
    public $nbCopies = 1;

    public function send()
    {

        $base_url = "https://documentivoire.ci";
        $res = Http::withHeaders([
            'Accept'=> 'application/json'
        ])
            ->post("$base_url/api/documents", [
                'type'=>[
                    'model'=>  'criminal-record',
                    'tag'=> "3",
                ],
                'id'=> auth()->Id(),
                'data'=> [
                    'person'=>[
                        'address'=> $this->user->ville .', '.$this->user->quartier,
                        'birth_place'=> $this->user->lieu_naissance ?? "",
                        'birth_at'=> $this->user->date_naissance ?? "",
                        'civil_status'=> $this->user->civilStatus,
                        'profession'=> $this->user->profession ?? "",
                        'sex'=> $this->user->sexe == 'Homme' ? 'M': 'F' ,
                        'nationality'=> 'IVOIRIENNE',
                        'firstname'=> $this->user->first_name ?? "",
                        'lastname'=>$this->user->last_name ?? "",
                        'children' => $this->user->nbr_enfants ?? 0,
                    ],
                    'father'=>[
                        'firstname'=>$this->user->first_name_pere ?? "",
                        'lastname'=>$this->user->last_name_pere ?? "",
                        'birth_at'=>$this->user->date_naissance_pere ?? "",
                        'birth_place'=> $this->user->lieu_naissance_pere ?? ""
                    ],
                    'mother'=>[
                        'firstname'=>$this->user->first_name_mere ?? "",
                        'lastname'=>$this->user->last_name_mere ?? "",
                        'birth_at'=>$this->user->date_naissance_mere ?? "",
                        'birth_place'=> $this->user->lieu_naissance_mere ?? ""
                    ],
                ],
                'certificates'=>$this->path,
                "hall"=>  1,
                'request'=> $this->demande->id,
                'nbcopies'=> $this->nbCopies,

            ]);
        if($res->status() == 200){
            $this->demande->setStatus(DemandeStatus::VALIDATION);
        }
    }

    public function handle(User $user, Demande $demande, array $path, $nbCopies)
    {
        $this->user = $user;
        $this->demande = $demande;
        $this->path = $path;
        $this->nbCopies = $nbCopies;
        $this->send();
    }
}
