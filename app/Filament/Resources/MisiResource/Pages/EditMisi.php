<?php

namespace App\Filament\Resources\MisiResource\Pages;

use App\Filament\Resources\MisiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMisi extends EditRecord
{
    protected static string $resource = MisiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
