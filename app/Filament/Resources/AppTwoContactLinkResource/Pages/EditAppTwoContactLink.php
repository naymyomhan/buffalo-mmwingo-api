<?php

namespace App\Filament\Resources\AppTwoContactLinkResource\Pages;

use App\Filament\Resources\AppTwoContactLinkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAppTwoContactLink extends EditRecord
{
    protected static string $resource = AppTwoContactLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
