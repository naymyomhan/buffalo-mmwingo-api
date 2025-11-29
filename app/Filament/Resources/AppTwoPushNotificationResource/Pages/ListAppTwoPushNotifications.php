<?php

namespace App\Filament\Resources\AppTwoPushNotificationResource\Pages;

use App\Filament\Resources\AppTwoPushNotificationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAppTwoPushNotifications extends ListRecords
{
    protected static string $resource = AppTwoPushNotificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
