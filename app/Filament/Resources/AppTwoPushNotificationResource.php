<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppTwoPushNotificationResource\Pages;
use App\Filament\Resources\AppTwoPushNotificationResource\RelationManagers;
use App\Models\AppTwoPushNotification;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppTwoPushNotificationResource extends Resource
{
    protected static ?string $model = AppTwoPushNotification::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell-alert';

    protected static ?string $navigationGroup = 'Live 22';

    protected static ?string $navigationLabel = 'Push Notifications';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('message')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\TextInput::make('url')
                    ->maxLength(255),
                SpatieMediaLibraryFileUpload::make('notifications')
                    ->collection('notifications')
                    ->imageEditor()
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('send')
                    ->action(fn(AppTwoPushNotification $record) => $record->sendNotification($record->id))
                    ->icon('heroicon-o-paper-airplane')
                    ->button(),
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
            'index' => Pages\ListAppTwoPushNotifications::route('/'),
            'create' => Pages\CreateAppTwoPushNotification::route('/create'),
            'edit' => Pages\EditAppTwoPushNotification::route('/{record}/edit'),
        ];
    }
}
