<?php

namespace App\Filament\Resources\SettingTwoResource\Pages;

use App\Filament\Resources\SettingTwoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSettingTwo extends EditRecord
{
    protected static string $resource = SettingTwoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
