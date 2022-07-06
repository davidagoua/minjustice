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
use Illuminate\Support\Str;
use Livewire\Component;

class CreateDemandeForm extends Component implements HasForms
{
    use InteractsWithForms;

    public TypeDocument $document, $contacts, $contact;
    public $juridiction = "";
    public $medium="mobile";
    public $contact_debit="";
    public $document_requis;

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

    public function getFormSchema(): array
    {
        $document = $this->document;
        return [
            Components\Card::make()->schema([
                Components\Wizard::make([
                    Components\Wizard\Step::make('Documents réquis')->schema([
                        Components\Placeholder::make('Informations')->content(function($state) use ($document){
                            return view('filaments.demande.information', compact('document'));
                        }),
                        Components\Repeater::make('document_requis')->schema([
                            Components\Select::make('Document')->options([
                                'Extrait de naissance',
                                'Certificat de nationalité',
                                "Attestation d'identité"
                            ]),
                            Components\TextInput::make('docnum')->label("Numéro du document")->required(),
                            Components\TextInput::make('date_delivrance')->label("Date de délivrance")
                                ->type('date'),
                            Components\FileUpload::make('document_requis')
                                ->acceptedFileTypes(['application/pdf'])
                                ->helperText("Joindre un document PDF"),

                        ])->minItems(count($document->docs))->required( count($document->docs) > 0)
                        ->defaultItems(2)->columns(4),

                        Components\Select::make('juridiction')
                            ->label("Juridiction")
                            ->options(Juridiction::all()->pluck('nom', 'id'))
                    ]),
                    Components\Wizard\Step::make('Paiement')->schema([
                        Components\Radio::make('medium')->label("Moyen de paiement")
                            ->options([
                                'visa'=>"Par Carte visa",
                                'mobile'=>'Par mobile Money'
                            ])->inline(),
                        Components\TextInput::make('carte')->hidden(function($get){
                            return $get('medium') != 'visa';
                        }),
                        Components\TextInput::make('contact_debit')->hidden(function($get){
                            return $get('medium') != 'mobile';
                        })->label("Contact a débiter")->prefix('+225')
                    ]),
                ])->reactive()
            ])
        ];
    }

    public function render()
    {
        return view('livewire.create-demande-form');
    }
}
