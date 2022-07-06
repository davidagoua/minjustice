<?php

namespace App\Http\Livewire;

use App\Models\User;
use Closure;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use \Filament\Forms\Components;


class UpdateProfileForm extends Component implements HasForms
{
    use InteractsWithForms;

    public User $user ;
    public $villeId, $quartier;
    public $villes = [
        'Abidjan','Yakro','Bouake','Beoumi','Tiebissou'
    ];
    public $first_name, $last_name, $date_naissance, $lieu_naissance, $sexe;
    public $contact, $last_name_pere, $last_name_mere, $first_name_pere, $first_name_mere;
    public $date_naissance_mere, $date_naissance_pere, $lieu_naissance_mere, $lieu_naissance_pere, $situation_matrimonial;

    public function getFormModel() : string
    {
        return $this->user;
    }

    public function mount()
    {
        $this->form->fill($this->user->only([
            'first_name','last_name','date_naissance','lieu_naissance','sexe','contact','quartier','villeId',
            'first_name_pere','last_name_pere','date_naissance_pere','lieu_naissance_pere','situation_matrimonial',
            'first_name_mere','last_name_mere','lieu_naissance_mere','date_naissance_mere',
        ]));
    }

    public function save()
    {
        $this->user->fill($this->form->getStateOnly([
            'first_name','last_name','date_naissance','lieu_naissance','ville','quartier',
            'situation_matrimonial','sexe','contact','date_naissance_pere','date_naissance_mere','lieu_naissance_mere',
            'lieu_naissance_pere','first_name_mere','first_name_pere','last_name_pere','last_name_mere'
        ]));
        $this->user->name = $this->user->last_name .' '. $this->user->first_name;
        $this->user->save();
    }

    public function getFormSchema()
    {
        return [
            Components\Card::make()->schema([
                    Grid::make(['default'=>1, 'md'=>2])->schema([
                        TextInput::make('last_name')->label('Nom')->extraInputAttributes([
                            'onKeyUp'=>"this.value = this.value.toUpperCase();"
                        ])->required()->disabled(),
                        TextInput::make('first_name')->extraInputAttributes([
                            'onKeyUp'=>"this.value = this.value.toUpperCase();"
                        ])->label('Prénoms')->required()->disabled(),
                    ]),

                    Grid::make(['default'=>1, 'md'=>2])->schema([
                        TextInput::make('date_naissance')->type('date')->validationAttribute("votre date de naissance")
                            ->before(now())->disabled()
                            ->label('Date de naissance')->required(),
                        TextInput::make('lieu_naissance')
                            ->label('Lieu de naissance')->extraInputAttributes([
                                'onKeyUp'=>"this.value = this.value.toUpperCase();"
                            ])->required()->disabled(),
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
                        TextInput::make('quartier')->label('Quartier')->required()->extraInputAttributes([
                            'onKeyUp'=>"this.value = this.value.toUpperCase();"
                        ])
                    ]),

                ]),
            Components\Card::make()->schema([
                    Components\Section::make('Père')->schema([
                        Grid::make(['default'=>1, 'md'=>2])->schema([
                            TextInput::make('last_name_pere')->label('Nom du père')->required()->extraInputAttributes([
                                'onKeyUp'=>"this.value = this.value.toUpperCase();"
                            ]),
                            TextInput::make('first_name_pere')->label('Prénoms du père')->required()->extraInputAttributes([
                                'onKeyUp'=>"this.value = this.value.toUpperCase();"
                            ]),
                        ])->disabled(),
                        Grid::make(['default'=>1, 'md'=>2])->schema([
                            TextInput::make('date_naissance_pere')->type('date')
                                ->before(now())
                                ->before('date_naissance')
                                ->label('Date de naissance du père')->required(),
                            TextInput::make('lieu_naissance_pere')
                                ->label('Lieu de naissance du père')->required()->extraInputAttributes([
                                    'onKeyUp'=>"this.value = this.value.toUpperCase();"
                                ]),
                        ]),
                    ])->disabled(),
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
                            TextInput::make('date_naissance_mere')->type('date')
                                ->before(now())
                                ->before('date_naissance')
                                ->label('Date de naissance de la mère')->required(),
                            TextInput::make('lieu_naissance_mere')
                                ->label('Lieu de naissance de la mère')->required()->extraInputAttributes([
                                    'onKeyUp'=>"this.value = this.value.toUpperCase();"
                                ]),
                        ]),
                    ])->disabled(),
                ]),

        ];
    }

    public function render()
    {
        return view('livewire.update-profile-form');
    }
}
