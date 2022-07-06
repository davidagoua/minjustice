<?php

namespace App\Filament\Resources\TypeDemandeResource\Pages;

use App\Filament\Resources\TypeDemandeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTypeDemande extends EditRecord
{
    protected static string $resource = TypeDemandeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
