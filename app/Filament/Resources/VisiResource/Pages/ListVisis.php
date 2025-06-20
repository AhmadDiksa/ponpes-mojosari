<?php

namespace App\Filament\Resources\VisiResource\Pages;

use App\Filament\Resources\VisiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVisis extends ListRecords
{
    protected static string $resource = VisiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
