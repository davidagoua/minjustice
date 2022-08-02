<?php

namespace App\Http\Livewire;

use App\Actions\MakePayementRequest;
use App\Actions\SendToValidation;
use App\Models\Demande;
use App\Models\Document;
use App\Models\Juridiction;
use App\Models\Paiement;
use App\Models\TypeDocument;
use App\Notifications\DemandeRegistered;
use Barryvdh\DomPDF\PDF;
use Filament\Facades\Filament;
use Filament\Forms\Components;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Actions\Modal\Actions\Action;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Features\Placeholder;

class CertificateFormWidget extends Component implements HasForms
{
    use InteractsWithForms;
    public $juridiction = "";
    public $isPaided = false;
    public $transaction_id;
    public $medium="mobile";
    public $contact_debit="";
    public $selected_typeCertificate = 0;
    public $paiement, $recap_certficat;
    public $document_requis = [
        [
            "Extrait d'acte de naissance",
            "un certificat de nationalité
ivoirienne ou d’une carte nationalité d'identité ou par témoignage"
        ],
        [
            "un extrait d'acte de naissance de l’intéressé","copie du document acquisitif de la nationalité du père et/ou de la mère ",
            "extrait d'acte de naissance sans mentions des père et mère",
        ],
        [
            "un extrait d'acte de naissance sans mentions des père et mère ","une copie de l'ordonnance du juge des tutelles reconnaissant la qualité d'enfant
trouvé"
        ],
        [
            "Un original de l’extrait d’acte de naissance du demandeur ","Une expédition du jugement de légitimation adoptive","Un certificat de nationalité ivoirienne ou carte nationale d'identité d'un des époux adoptifs ou témoignage"
        ],
        [
            "Un original de l’extrait d’acte de  naissance du - demandeur","Une expédition du jugement d’adoption","Un certificat de nationalité ivoirienne ou carte nationale d'identité d'un des époux adoptifs ou témoignage",
        ],
        [
            "une preuve du mariage (extrait d'acte de mariage ou livret de famille)","une preuve que le mari est Ivoirien (certificat de
nationalité ivoirienne ou carte nationale d'identité certifié conforme à l’original)","une attestation du Ministre de la Justice constatant qu’elle n'a pas souscrit une déclaration en vue de décliner la nationalité ivoirienne (Attestation de non déclination) ",
            "une attestation du ministre de la Justice constatant qu’il n’ y a pas de décret d’opposition du Gouvernement et/ ou décret de déchéance de la nationalité du mari s’il a acquis la nationalité ivoirienne par naturalisation",
            "une attestation des services du ministère de l’Intérieur constatant qu’il n’ y a pas eu d’arrêté
d’expulsion du conjoint étranger."
        ],
        [
            "une preuve du mariage (extrait d'acte de mariage ou livret de famille)",
            "une preuve que le mari est Ivoirien (certificat de nationalité ivoirienne ou carte nationale d'identité certifié conforme à l’original)",
            "une attestation du Ministre de la Justice constatant qu’elle n'a pas souscrit une déclaration en vue de décliner la nationalité ivoirienne (Attestation de non déclination) ",
            "une attestation du ministre de la Justice constatant qu’il n’ y a pas de décret d’opposition du  Gouvernement et/ ou décret de déchéance de la nationalité du mari s’il a acquis la nationalité ivoirienne par naturalisation",
            "une attestation des services du ministère de l’Intérieur constatant qu’il n’ y a pas eu d’arrêté d’expulsion du conjoint étranger."
        ],
        [
            "un extrait d’acte de naissance de l’intéressé","une attestation délivrée par le Ministre de la Justice et constatant que la déclaration
a été souscrite et enregistrée au niveau de la direction compétente de son ministère",

        ],
        [
            "un extrait d’acte de naissance de l’intéressé","une copie certifiée conforme à l’original du certificat d’acquisition de la nationalité
ivoirienne délivré par le Ministre de la Justice et constatant que la déclaration a été
souscrite et enregistrée au niveau de la direction compétente de son ministère"
        ],
        [
            "Extrait d’acte de naissance de l’intéressé","soit une ampliation du décret de naturalisation, soit un exemplaire du Journal officiel
ayant publié le décret, soit une attestation délivrée par le Ministre de la Justice et
constatant l'existence du décret "
        ],
        [
            "Extrait d’acte de naissance de l’intéressé","soit une ampliation du décret de naturalisation, soit un exemplaire du Journal officiel
ayant publié le décret, soit une attestation délivrée par le Ministre de la Justice et
constatant l'existence du décret "
        ]
    ];
    public const typeCertificate = [
      "Ivoirien par filiation",
        "Ivoirien par effet extensif de l’acquisition de la nationalité du père ",
        "Ivoirien par naissance sur le sol ivoirien de parents inconnus",
        "Ivoirien par mariage",
        "Ivoirien par adoption (L'enfant qui a fait l'objet d'une légitimation adoptive acquiert la nationalité ivoirienne si l'un des parents adoptifs est ivoirien. )",
        "Ivoirien par adoption (Autres cas )",
        "Ivoirien par déclaration (en application des articles 17 à 23 du Code qui ont été abrogés par la loi 72-852 du 21 Décembre 1972 qui a supprimé la déclaration comme mode d'acquisition de la nationalité. )",
        "Ivoirien par déclaration (en application de la Loi n° 2013-653 du 13 septembre 2013 portant dispositions particulières en matière d'acquisition de la nationalité par déclaration (janvier 2014 à janvier 2016) )",
        "Ivoirien par naturalisation",
        "Ivoirien par la réintégration"
    ];
    public $numerodocs = [];
    public $required = [];
    public $files = [];
    public $dates = [];
    protected array $rules = [];
    public $nbCopies = 1;

    public $listeners = [
        'accepted'=>'save',
        'failed'=>'failed'
    ];


    public function rules() : array
    {
        return [];
    }


    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->document = TypeDocument::whereUrl('form.certificate-of-nationality')->first();
    }


    public function mount()
    {

       // $documents = collect(explode('|', $this->document->required_field)) ;
        //$this->documents_requis = $documents->map(function($doc){ return Str::of($doc)->trim()->title()->toString();}) ;
    }

    public function getFormModel() : string
    {
        return Demande::class;
    }

    public function failed()
    {
        Filament::notify('error', "Paiement non validé");
    }

    public function save()
    {
        $this->isPaided = true;
        $state = $this->form->getState();
        $demande = new Demande();
        $demande->user()->associate(auth()->user());
        $demande->juridiction_id = $state['juridiction'] ?? 1 ;
        $demande->type_document()->associate($this->document);
        $demande->save();
        $path = auth()->user()->fullName.'-'.$demande->id;
        $required_fields = [];


        //upload files
        foreach ($state['files'] as $key => $file){
            $lpath = Storage::disk('s3')->put($path, $file);

            $required_fields[] = [
              'code'=> $state['numerodocs'][$key],
              'path'=> $lpath,
              'issue_at'=> $state['dates'][$key],
                'type'=> $this->document_requis[$this->selected_typeCertificate][$key] ?? '',
            ];
        }


        $this->paiement = Paiement::create([
            'user_id' => auth()->id(),
            'demande_id' => $demande->id,
            'reference' => $this->transaction_id,
            'montant' => $demande->type_document->montant,
            'contact' => $this->contact_debit,
        ]);
        $demande->paiement_id = $this->paiement->id;
        $demande->save();

        Filament::notify('success', "Paiement  validé");
        SendToValidation::run(auth()->user(), $demande, $required_fields, $this->nbCopies);
        auth()->user()->notify(new DemandeRegistered($demande));
    }

    public function download_recu()
    {
        return redirect()->route('demande.download_recu',[
            'paiement'=> $this->paiement
        ]);
    }

    public static function getRequiredDocOption($label)
    {


    }

    public function getDocsSection() : Components\Section
    {
        $requireds = $this->document_requis[$this->selected_typeCertificate];
        $items = [];
        foreach ($requireds as $key => $field){

            $items[] = Components\Grid::make(['default'=>'4'])->schema([
                Components\Placeholder::make('namesss.'.$key)->content($field)
                       ->label("Document"),
                Components\Hidden::make('required.'.$key)->extraAttributes(['value'=>$field]),
                Components\TextInput::make('numerodocs.'.$key)->label("Numero du document")->required(),
                Components\TextInput::make('dates.'.$key)->label("Date de délivrance")->type('date')->required(),
                Components\TextInput::make('files.'.$key)->label("Fichier")->type('file')->required(),
            ]);
        }
        return Components\Section::make("Documents requis: ". self::typeCertificate[$this->selected_typeCertificate])
            ->schema($items);
    }

    public function getFormSchema(): array
    {
        $document = $this->document;
        $selected_typeCertificate = $this->selected_typeCertificate;
        return [
            Components\Card::make()->schema([

                Components\Wizard::make([

                    Components\Wizard\Step::make('Documents réquis')->schema([

                        Components\Radio::make('selected_typeCertificate')->options(collect(self::typeCertificate)->toArray())
                            ->label("Type de Naturalisationn"),


                        $this->getDocsSection()->reactive(),

                        Components\Select::make('juridiction')
                            ->label("Juridiction la plus proche")
                            ->options(Juridiction::all()->pluck('nom', 'id'))


                    ])->reactive(),


                    Components\Wizard\Step::make('Paiement')->schema([
                        Components\TextInput::make('nbCopies')->reactive()
                            ->numeric()
                            ->label("Nombre de copies")->required(),
                        Components\Placeholder::make('Recapitulatif')->content(function($state) use ($document, $selected_typeCertificate){
                            return view('form.recap_certificate', [
                                'type_naturalisation'=> self::typeCertificate[$selected_typeCertificate],
                                'user'=> auth()->user(),
                                'nbCopies'=> $this->nbCopies,
                                'document'=> $document,
                                'requireds'=> $this->document_requis[$this->selected_typeCertificate]
                            ]);
                        })->columnSpan(2),
                        Components\Placeholder::make('cinetpay')->label("")
                            ->content(new HtmlString('<div class="text-center"><button type="button" class="button h-button" onclick="checkout('.(int) $this->nbCopies * (int) $this->document->montant.')">Proceder au paiement</button></div>'))
                    ]),
                ])
                    ->submitAction(new HtmlString("<button type='submit' wire:click.prevent='save' class='button h-button btn-primary'>S'inscrire</button>"))
            ])
        ];
    }



    public function render()
    {
        return view('livewire.certificate-form-widget');
    }
}
