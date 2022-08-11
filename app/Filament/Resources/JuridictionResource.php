<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JuridictionResource\Pages;
use App\Filament\Resources\JuridictionResource\RelationManagers;
use App\Models\Juridiction;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JuridictionResource extends Resource
{
    protected static ?string $model = Juridiction::class;

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
                Tables\Columns\TextColumn::make('nom'),
                Tables\Columns\BadgeColumn::make('type'),
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
            'index' => Pages\ListJuridictions::route('/'),
            'create' => Pages\CreateJuridiction::route('/create'),
            'edit' => Pages\EditJuridiction::route('/{record}/edit'),
        ];
    }
}
