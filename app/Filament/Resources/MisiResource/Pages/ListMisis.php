<?php

namespace App\Filament\Resources\MisiResource\Pages;

use App\Filament\Resources\MisiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMisis extends ListRecords
{
    protected static string $resource = MisiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
