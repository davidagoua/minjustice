<?php

namespace App\Http\Livewire;

use App\Actions\SendToValidation;
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
                            ->unique(table: User::class)
                            ->label('Adresse mail')->required(),
                        TextInput::make('password')->password()->label('Mot de passe')->required(),
                        TextInput::make('password_confirmation')
                            ->same('password')
                            ->password()->label('Confirmer le mot de passe')->required(),
                    ]),
                    Components\Wizard\Step::make('Personnel')->label('Informations personnelles')->schema([
                        Grid::make(['default'=>1, 'md'=>2])->schema([
                            TextInput::make('last_name')->label('Nom')->extraInputAttributes([
                                'onKeyUp'=>"this.value = this.value.toUpperCase();"
                            ])->required(),
                            TextInput::make('first_name')->extraInputAttributes([
                                'onKeyUp'=>"this.value = this.value.toUpperCase();"
                            ])->label('Prénoms')->required(),
                        ]),

                        Grid::make(['default'=>1, 'md'=>2])->schema([
                            Components\TextInput::make('date_naissance')->validationAttribute("votre date de naissance")
                                ->type('date')
                                ->before(now())
                                ->label('Date de naissance')->required(),
                            TextInput::make('lieu_naissance')
                                ->label('Lieu de naissance')->extraInputAttributes([
                                    'onKeyUp'=>"this.value = this.value.toUpperCase();"
                                ])->required(),
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
                                ->tel()->prefix('+225')->required()->numeric()
                                ->length(10)
                        ]),

                        Radio::make('sexe')
                            ->options([
                                'Homme'=>'Homme',
                                'Femme'=>'Femme'
                            ])
                            ->inline()
                            ->label('Genre')->required(),

                        Grid::make(['default'=>1, 'md'=>2])->schema([
                            Select::make('villeId')->label("Ville")
                                ->helperText("Ou habitez-vous")
                                ->options($this->villes)->required(),
                            TextInput::make('quartier')->label('Commune')->required()->extraInputAttributes([
                                'onKeyUp'=>"this.value = this.value.toUpperCase();"
                            ])
                        ]),

                    ]),
                    Components\Wizard\Step::make('Parental')->label('Informations de filiations')
                        ->schema([
                        Components\Section::make('Père')->schema([
                            Grid::make(['default'=>1, 'md'=>2])->schema([
                                TextInput::make('last_name_pere')->label('Nom du père')->required()->extraInputAttributes([
                                    'onKeyUp'=>"this.value = this.value.toUpperCase();"
                                ]),
                                TextInput::make('first_name_pere')->label('Prénoms du père')->required()->extraInputAttributes([
                                    'onKeyUp'=>"this.value = this.value.toUpperCase();"
                                ]),
                            ]),
                            Grid::make(['default'=>1, 'md'=>2])->schema([
                                Components\TextInput::make('date_naissance_pere')
                                    ->type('date')
                                    ->before(now())
                                    ->before('date_naissance')
                                    ->label('Date de naissance du père')->required(),
                                TextInput::make('lieu_naissance_pere')
                                    ->label('Lieu de naissance du père')->required()->extraInputAttributes([
                                        'onKeyUp'=>"this.value = this.value.toUpperCase();"
                                    ]),
                            ]),
                        ]),
                        Components\Section::make('Mère')->schema([
                            Grid::make(['default'=>1, 'md'=>2])->schema([
                                TextInput::make('last_name_mere')->label('Nom de la mère')->required()->extraInputAttributes([
                                    'onKeyUp'=>"this.value = this.value.toUpperCase();"
                                ]),
                                TextInput::make('first_name_mere')->label('Prénoms de la mère')->required()->extraInputAttributes([
                                    'onKeyUp'=>"this.value = this.value.toUpperCase();"
                                ]),
                            ]),
                            Grid::make(['default'=>1, 'md'=>2])->schema([
                                Components\TextInput::make('date_naissance_mere')
                                    ->type('date')
                                    ->before(now())
                                    ->before('date_naissance')
                                    ->label('Date de naissance de la mère')->required(),
                                TextInput::make('lieu_naissance_mere')
                                    ->label('Lieu de naissance de la mère')->required()->extraInputAttributes([
                                        'onKeyUp'=>"this.value = this.value.toUpperCase();"
                                    ]),
                            ]),
                        ]),
                    ]),
                ])->submitAction(new HtmlString("<button wire:click.prevent='save'  class='button h-button btn-primary'>S'inscrire</button>"))
            ])
        ];
    }

    public function render()
    {
        return view('livewire.resgister-form');
    }
}
