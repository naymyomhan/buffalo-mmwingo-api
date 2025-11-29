<?php

namespace App\Filament\Resources\SettingTwoResource\Pages;

use App\Filament\Resources\SettingTwoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSettingTwos extends ListRecords
{
    protected static string $resource = SettingTwoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
