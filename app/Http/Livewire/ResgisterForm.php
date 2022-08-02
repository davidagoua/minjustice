<?php

namespace App\Http\Livewire;

use App\Actions\SendToValidation;
use App\Models\Juridiction;
use App\Models\User;
use App\Notifications\UserRegistered;
use Closure;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\HtmlString;
use Livewire\Component;
use \Filament\Forms\Components;
use function PHPUnit\Framework\throwException;




class ResgisterForm extends Component implements HasForms
{
    use InteractsWithForms;
    public $villeId, $quartier;
    public $like = 1;
    public $villes = [
        'Abidjan','Yakro','Bouake','Beoumi','Tiebissou'
    ];
    public $email, $password, $first_name, $last_name, $password_confirmation, $date_naissance, $lieu_naissance, $sexe;
    public $contact, $last_name_pere, $last_name_mere, $first_name_pere, $first_name_mere;
    public $date_naissance_mere, $date_naissance_pere, $lieu_naissance_mere, $lieu_naissance_pere, $situation_matrimonial;
    public $numero_document_pere, $fichier_document_pere, $date_document_pere, $libele_document_pere;
    public $numero_document_mere, $fichier_document_mere, $date_document_mere, $libele_document_mere;
    public $numero_extrait, $fichier_extrait, $date_extrait;


    public function getFormModel() : string
    {
        return User::class;
    }

    public function like()
    {
        $this->like++;
    }

    public function save()
    {
        try{
            DB::beginTransaction();
            $user = new User();
            $user->fill($this->form->getStateOnly([
                'email','first_name','last_name','date_naissance','lieu_naissance','ville','quartier',
                'situation_matrimonial','sexe','contact','date_naissance_pere','date_naissance_mere','lieu_naissance_mere',
                'lieu_naissance_pere','first_name_mere','first_name_pere','last_name_pere','last_name_mere'
            ]));
            $user->contact = '225'.$this->contact;
            $user->register_step = 0;
            $user->name = $user->last_name .' '. $this->first_name;
            $user->password = Hash::make($this->password);
            $user->save();
            DB::commit();
            Auth::login($user);

            $user->notify(new UserRegistered());
        }catch (\Exception $e){
            throwException($e);
        } finally {
            return redirect()->route('dashboard');
        }


    }

    public function getFormSchema()
    {
        return [
            Components\Card::make()->schema([
                Components\Wizard::make([
                    Components\Wizard\Step::make('Account')->label('Informations de connexion')->schema([
                        TextInput::make('email')->email()
                            ->prefixIcon('heroicon-o-mail')
                            ->unique(table: User::class)
                            ->label('Adresse mail')->required(),
                        Grid::make(['default'=>2])->schema([
                            TextInput::make('password')->password()->label('Mot de passe')
                                ->prefixIcon('heroicon-o-lock-closed')
                                ->required(),
                            TextInput::make('password_confirmation')
                                ->prefixIcon('heroicon-o-lock-closed')
                                ->same('password')
                                ->password()->label('Confirmer le mot de passe')->required()
                        ]),
                    ]),
                    Components\Wizard\Step::make('Personnel')->label('Informations personnelles')->schema([
                        Grid::make(['default'=>1, 'md'=>2])->schema([
                            TextInput::make('last_name')->label('Nom')->extraInputAttributes([
                                'onKeyUp'=>"this.value = this.value.toUpperCase();"
                            ])->prefixIcon('heroicon-o-user')->required(),
                            TextInput::make('first_name')->extraInputAttributes([
                                'onKeyUp'=>"this.value = this.value.toUpperCase();"
                            ])->label('Prénoms')->required()->prefixIcon('heroicon-o-user'),
                        ]),

                        Grid::make(['default'=>1, 'md'=>2])->schema([
                            Components\TextInput::make('date_naissance')->validationAttribute("votre date de naissance")
                                ->type('date')
                                ->before(now())
                                ->label('Date de naissance')->required()->prefixIcon('heroicon-o-calendar'),
                            TextInput::make('lieu_naissance')
                                ->label('Lieu de naissance')->extraInputAttributes([
                                    'onKeyUp'=>"this.value = this.value.toUpperCase();"
                                ])->required()->prefixIcon('heroicon-o-map'),
                        ]),

                        Grid::make(['default'=>1, 'md'=>2])->schema([
                            Select::make('situation_matrimonial')
                                ->options([
                                    'Marie'=>'Marié',
                                    'Celibataire'=>'Célibataire',
                                    'Autre'=>'Autre'
                                ])
                                ->label('Situation matrimoniale')
                                ->required(),
                            TextInput::make('contact')->label("Numéro de téléphone")
                                ->tel()->prefix('+225')->required()
                                ->length(10)
                        ]),


                        Grid::make(['default'=>1, 'md'=>2])->schema([

                            TextInput::make('quartier')->label("Lieu d'habitation")->required()->extraInputAttributes([
                                'onKeyUp'=>"this.value = this.value.toUpperCase();"
                            ])->placeholder('Abidjan,Cocody,Danga')->prefixIcon('heroicon-o-home'),

                            Radio::make('sexe')
                                ->options([
                                    'Homme'=>'Homme',
                                    'Femme'=>'Femme'
                                ])
                                ->label('Genre')->required(),

                        ]),

                        Components\Section::make('Document')->schema([
                          Grid::make(['default'=>4])->schema([
                              Select::make('villeId')->label("Juridiction de naissance")
                                  ->options(Juridiction::all()->pluck('nom', 'id'))->required(),
                              TextInput::make('numero_extrait')->required()->label("Numéro de l'extrait de naissance"),
                              TextInput::make('fichier_extrait')->type('file')->label('Extrait de naissance')->required(),
                              Components\TextInput::make('date_extrait')
                                  ->type('date')
                                  ->label('Date de delivrance l\'extrait de naissance')->required(),
                          ])
                        ])

                    ]),
                    Components\Wizard\Step::make('Parental')->label('Informations de filiations')
                        ->schema([
                            Components\Section::make('Père')->schema([
                            Grid::make(['default'=>1, 'md'=>2])->schema([
                                TextInput::make('last_name_pere')->label('Nom du père')->extraInputAttributes([
                                    'onKeyUp'=>"this.value = this.value.toUpperCase();"
                                ])->prefixIcon('heroicon-o-user'),
                                TextInput::make('first_name_pere')->label('Prénoms du père')->extraInputAttributes([
                                    'onKeyUp'=>"this.value = this.value.toUpperCase();"
                                ])->prefixIcon('heroicon-o-user'),
                            ]),
                            Grid::make(['default'=>1, 'md'=>2])->schema([
                                Components\TextInput::make('date_naissance_pere')
                                    ->type('date')
                                    ->before(now())->prefixIcon('heroicon-o-calendar')
                                    ->before('date_naissance')
                                    ->label('Date de naissance du père'),
                                TextInput::make('lieu_naissance_pere')
                                    ->label('Lieu de naissance du père')->extraInputAttributes([
                                        'onKeyUp'=>"this.value = this.value.toUpperCase();"
                                    ])->prefixIcon('heroicon-o-map'),
                                Select::make('libele_document_pere')->options([
                                   'Carte d\'identité'=>'Carte d\'identité',
                                      'Passeport'=>'Passeport',

                                ]),
                                TextInput::make('numero_document_pere')->label('Numéro de document du père'),
                                TextInput::make('fichier_document_pere')->type('file')->label('Document du père'),
                                Components\TextInput::make('date_document_pere')->type('date')->label('Date de delivrance du document du père'),

                            ]),
                        ]),
                        Components\Section::make('Mère')->schema([
                            Grid::make(['default'=>1, 'md'=>2])->schema([
                                TextInput::make('last_name_mere')->label('Nom de la mère')->extraInputAttributes([
                                    'onKeyUp'=>"this.value = this.value.toUpperCase();"
                                ])->prefixIcon('heroicon-o-user'),
                                TextInput::make('first_name_mere')->label('Prénoms de la mère')->extraInputAttributes([
                                    'onKeyUp'=>"this.value = this.value.toUpperCase();"
                                ])->prefixIcon('heroicon-o-user'),
                            ]),
                            Grid::make(['default'=>1, 'md'=>2])->schema([
                                Components\TextInput::make('date_naissance_mere')
                                    ->type('date')
                                    ->before(now())->prefixIcon('heroicon-o-calendar')
                                    ->before('date_naissance')
                                    ->label('Date de naissance de la mère'),
                                TextInput::make('lieu_naissance_mere')
                                    ->label('Lieu de naissance de la mère')->extraInputAttributes([
                                        'onKeyUp'=>"this.value = this.value.toUpperCase();"
                                    ])->prefixIcon('heroicon-o-map'),
                                Select::make('libele_document_mere')->options([
                                    'Carte d\'identité'=>'Carte d\'identité',
                                    'Passeport'=>'Passeport',

                                ]),
                                TextInput::make('numero_document_mere')->label('Numéro de document du mère'),
                                TextInput::make('fichier_document_mere')->type('file')->label('Document du mère'),
                                Components\TextInput::make('date_document_mere')->type('date')->label('Date de delivrance du document du mère'),
                            ]),
                        ]),
                    ]),
                ])->submitAction(new HtmlString("<button type='submit' class='button h-button btn-primary'>S'inscrire</button>"))
            ])
        ];
    }

    public function render()
    {
        return view('livewire.resgister-form');
    }
}
