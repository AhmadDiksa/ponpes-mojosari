<?php

namespace App\Filament\Resources\Settings\HeaderResource\Pages;

use App\Filament\Resources\Settings\HeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHeader extends ViewRecord
{
    protected static string $resource = HeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
