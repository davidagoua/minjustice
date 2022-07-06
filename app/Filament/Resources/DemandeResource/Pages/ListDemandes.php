<?php

namespace App\Filament\Resources\DemandeResource\Pages;

use App\Filament\Resources\DemandeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDemandes extends ListRecords
{
    protected static string $resource = DemandeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
