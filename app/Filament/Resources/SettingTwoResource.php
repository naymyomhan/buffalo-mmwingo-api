<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingTwoResource\Pages;
use App\Filament\Resources\SettingTwoResource\RelationManagers;
use App\Models\SettingTwo;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingTwoResource extends Resource
{
    protected static ?string $model = SettingTwo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('contact_title')->required(),
                RichEditor::make('privacy_policy')->required(),
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
            'index' => Pages\ListSettingTwos::route('/'),
            'create' => Pages\CreateSettingTwo::route('/create'),
            'edit' => Pages\EditSettingTwo::route('/{record}/edit'),
        ];
    }
}
