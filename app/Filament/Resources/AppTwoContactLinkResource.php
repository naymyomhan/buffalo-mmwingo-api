<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppTwoContactLinkResource\Pages;
use App\Models\AppTwoContactLink;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AppTwoContactLinkResource extends Resource
{
    protected static ?string $model = AppTwoContactLink::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';

    protected static ?string $navigationGroup = 'Live 22';

    protected static ?string $navigationLabel = 'Contact Links';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('link')
                    ->required(),
                TextInput::make('label')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('link'),
                Tables\Columns\TextColumn::make('label'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListAppTwoContactLinks::route('/'),
            'create' => Pages\CreateAppTwoContactLink::route('/create'),
            'edit' => Pages\EditAppTwoContactLink::route('/{record}/edit'),
        ];
    }
}
