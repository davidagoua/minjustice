<?php

namespace App\Filament\Resources\TypeDemandeResource\Pages;

use App\Filament\Resources\TypeDemandeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTypeDemandes extends ListRecords
{
    protected static string $resource = TypeDemandeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
