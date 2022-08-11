<?php

namespace App\Filament\Resources\JuridictionResource\Pages;

use App\Filament\Resources\JuridictionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJuridiction extends EditRecord
{
    protected static string $resource = JuridictionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
