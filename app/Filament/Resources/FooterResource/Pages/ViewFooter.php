<?php

namespace App\Filament\Resources\FooterResource\Pages;

use App\Filament\Resources\FooterResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFooter extends ViewRecord
{
    protected static string $resource = FooterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
