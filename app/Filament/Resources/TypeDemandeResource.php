<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TypeDemandeResource\Pages;
use App\Filament\Resources\TypeDemandeResource\RelationManagers;
use App\Models\TypeDemande;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TypeDemandeResource extends Resource
{
    protected static ?string $model = TypeDemande::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTypeDemandes::route('/'),
            'create' => Pages\CreateTypeDemande::route('/create'),
            'edit' => Pages\EditTypeDemande::route('/{record}/edit'),
        ];
    }    
}
