<?php

namespace App\Http\Livewire;

use App\Actions\MakePayementRequest;
use App\Actions\SendCasierToValidation;
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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;
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
    public $document_requit;
    public $isPaided = false;
    public $paiement;
    public $nbCopies = 1;
    public $docnum, $date_delivrance;

    public $listeners = [
        'accepted'=>'save',
        'failed'=>'failed'
    ];


    public function mount()
    {
        $documents = collect(explode('|', $this->document->required_field)) ;
        $this->documents_requis = $documents->map(function($doc){ return Str::of($doc)->trim()->title()->toString();}) ;
    }

    public function getFormModel() : string
    {
        return Demande::class;
    }

    public function failed()
    {

    }

    public function save()
    {
        $this->isPaided = true;
        $state = $this->form->getState();
        $demande = new Demande();
        $demande->user()->associate(auth()->user());
        $demande->juridiction_id = auth()->user()->ville;
        $demande->type_document()->associate($this->document);
        $demande->save();
        $this->paiement = Paiement::create([
            'user_id' => auth()->id(),
            'demande_id' => $demande->id,
            'reference' => Str::random(10),
            'montant' => $demande->type_document->montant,
            'contact' => $this->contact_debit,
        ]);

        $demande->paiement_id = $this->paiement->id;
        $demande->save();

        $items = [];
        $path = auth()->user()->fullName.'-'.$demande->id;

        foreach($state['document_requit'] as $key=>$reqs){
            $lpath = Storage::disk('s3')->put($path, $reqs['document_requis']);
            $items[] = [
                'code'=> $this->docnum,
                'path'=> $lpath,
                'issue_at'=> $this->date_delivrance,
                'type'=> $file->originalName ?? 'document'.$key
            ];
        }

        //$response = $this->paiement->makeRequest();
        SendCasierToValidation::run(auth()->user(), $demande, $items);
        auth()->user()->notify(new DemandeRegistered($demande));
        //return redirect()->route('dashboard')->with('demande_registered', $this->document->intitule);
    }

    public function getFormSchema(): array
    {
        $document = $this->document;
        return [
            Components\Card::make()->schema([
                Components\Wizard::make([
                    Components\Wizard\Step::make('Documents réquis')->schema([

                        Components\Grid::make(['default'=>4])->schema([
                            Components\Placeholder::make('document')
                                ->label('document')
                                ->content("Extrait de naissance"),
                            Components\TextInput::make('docnum')->label("Numéro du document")->required(),
                            Components\TextInput::make('date_delivrance')->label("Date de délivrance")
                                ->type('date'),
                            Components\TextInput::make('document_requis')
                                ->type('file'),

                        ]),


                    ]),
                    Components\Wizard\Step::make('Paiement')->schema([

                        Components\TextInput::make('nbCopies')->reactive()
                            ->numeric()
                            ->label("Nombre de copies")->required(),

                        Components\Placeholder::make('Recapitulatif')->content(function($state) use ($document){
                            return view('form.recap_casier', [
                                'user'=> auth()->user(),
                                'document'=> $document,
                                'nbCopies'=> $this->nbCopies,
                                'requireds'=> $this->document
                            ]);
                        }),
                        Components\Placeholder::make('cinetpay')->label("Paiement")
                            ->content(new HtmlString('<div class="text-center"><button type="button" class="button h-button" onclick="checkout()">Proceder au paiement</button></div>'))
                    ]),
                ])->reactive()
                //submitAction(new HtmlString("<button type='submit' wire:click.prevent='save' class='button h-button btn-primary'>S'inscrire</button>"))
            ])
        ];
    }

    public function download_recu()
    {
        return redirect()->route('demande.download_recu',[
            'paiement'=> $this->paiement
        ]);
    }

    public function render()
    {
        return view('livewire.create-demande-form');
    }
}
