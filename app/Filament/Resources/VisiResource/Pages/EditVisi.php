<?php

namespace App\Filament\Resources\VisiResource\Pages;

use App\Filament\Resources\VisiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVisi extends EditRecord
{
    protected static string $resource = VisiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
