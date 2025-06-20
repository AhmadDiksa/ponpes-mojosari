<?php

namespace App\Filament\Resources\ppdb\PpdbInfoResource\Pages;

use App\Filament\Resources\ppdb\PpdbInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPpdbInfos extends ListRecords
{
    protected static string $resource = PpdbInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
