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
use Filament\Forms\Components;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Actions\Modal\Actions\Action;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Features\Placeholder;

class CertificateFormWidget extends Component implements HasForms
{
    use InteractsWithForms;
    public $juridiction = "";
    public $medium="mobile";
    public $contact_debit="";
    public $selected_typeCertificate = 0;
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
    public $typeCertificate = [
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
    public $required, $numerodoc, $files, $date;


    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->typeCertificate = collect($this->typeCertificate);
        $this->document = TypeDocument::whereUrl('form.certificate-of-nationality')->first();
    }


    public function mount()
    {
        $documents = collect(explode('|', $this->document->required_field)) ;
        $this->documents_requis = $documents->map(function($doc){ return Str::of($doc)->trim()->title()->toString();}) ;
    }

    public function getFormModel() : string
    {
        return Demande::class;
    }

    public function save()
    {
        $demande = new Demande();
        $demande->user()->associate(auth()->user());
        $demande->juridiction_id = $this->juridiction;
        $demande->type_document()->associate($this->document);
        $demande->save();
        $paiement = Paiement::create([
            'user_id' => auth()->id(),
            'demande_id' => $demande->id,
            'reference' => Str::random(10),
            'montant' => 100,
            'contact' => $this->contact_debit,
        ]);
        $response = $paiement->makeRequest();
        dd($response);

        SendToValidation::run(auth()->user(), $demande);
        //auth()->user()->notify(new DemandeRegistered($demande));
        return redirect()->route('dashboard')->with('demande_registered', $this->document->intitule);
    }

    public function getDocsSection() : Components\Section
    {
        $requireds = $this->document_requis[$this->selected_typeCertificate];
        $items = [];
        foreach ($requireds as $key => $field){
            $items[] = Components\Grid::make(['default'=>'4'])->schema([
               Components\Placeholder::make('required')->content($field)->label("Document"),
                Components\TextInput::make('numerodoc')->label("Numero du document"),
                Components\TextInput::make('date')->label("Date de délivrace")->type('date'),
                Components\FileUpload::make('files')->label("Fichier")
                    ->helperText("Joindre un document PDF")
                    ->acceptedFileTypes(['application/pdf'])
            ]);
        }

        return Components\Section::make("Documents requis: ". $this->typeCertificate[$this->selected_typeCertificate])->schema($items);
    }

    public function getFormSchema(): array
    {
        $document = $this->document;
        return [
            Components\Card::make()->schema([

                Components\Wizard::make([

                    Components\Wizard\Step::make('Documents réquis')->schema([
                        /*
                        Components\Radio::make('typeCertificate')->options($this->typeCertificate)
                            ->label("Type de Nationalité")
                            ->afterStateUpdated(function($set, $state){
                                $this->selected_typeCertificate = (int) $state;
                            }),

                        */

                        Components\Placeholder::make('typeScertificate')->view('filaments.type_certificate',
                            ['typeCertificates'=>$this->typeCertificate]
                        ),

                        $this->getDocsSection(),

                        Components\Select::make('juridiction')
                            ->label("Juridiction")
                            ->options(Juridiction::all()->pluck('nom', 'id'))
                    ]),


                    Components\Wizard\Step::make('Paiement')->schema([
                        Components\Placeholder::make('cinetpay')->label("Paiement")
                            ->content(new HtmlString('<div class="text-center"><button type="button" class="button h-button" onclick="checkout()">Proceder au paiement</button></div>'))
                    ]),
                ])->reactive()
            ])
        ];
    }

    public function callCinetPay()
    {
        return redirect()->route('paiementForm')->with([
            'amount'=>150,
            'transaction_id'=>"2345678098765RGHJJ"
        ]);
    }

    public function render()
    {
        return view('livewire.create-demande-form');
    }
}
