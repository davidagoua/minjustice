<?php

namespace App\Filament\Resources\DemandeResource\Pages;

use App\Filament\Resources\DemandeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDemande extends EditRecord
{
    protected static string $resource = DemandeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
