<?php

namespace App\Filament\Resources\ppdb\PpdbInfoResource\Pages;

use App\Filament\Resources\ppdb\PpdbInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPpdbInfo extends EditRecord
{
    protected static string $resource = PpdbInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
