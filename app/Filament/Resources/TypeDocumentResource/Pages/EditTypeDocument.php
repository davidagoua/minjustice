<?php

namespace App\Filament\Resources\TypeDocumentResource\Pages;

use App\Filament\Resources\TypeDocumentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTypeDocument extends EditRecord
{
    protected static string $resource = TypeDocumentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
