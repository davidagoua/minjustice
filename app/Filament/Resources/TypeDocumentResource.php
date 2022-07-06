<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TypeDocumentResource\Pages;
use App\Filament\Resources\TypeDocumentResource\RelationManagers;
use App\Models\TypeDocument;
use Faker\Provider\Text;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TypeDocumentResource extends Resource
{
    protected static ?string $model = TypeDocument::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('intitule')->required(),
                Forms\Components\TextInput::make('type')->required(),
                Forms\Components\TextInput::make('specificite'),
                Forms\Components\TagsInput::make('documents_requis')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('intitule'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('specificite'),
                Tables\Columns\BadgeColumn::make('documents_requis'),
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
            'index' => Pages\ListTypeDocuments::route('/'),
            'create' => Pages\CreateTypeDocument::route('/create'),
            'edit' => Pages\EditTypeDocument::route('/{record}/edit'),
        ];
    }
}
